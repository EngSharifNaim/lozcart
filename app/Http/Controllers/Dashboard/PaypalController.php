<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin\CouponSubscription;
use App\Models\Admin\CouponSubscriptionUse;
use App\Models\Admin\Market;
use App\Models\Admin\TraderPlan;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\PaymentExecution;
use URL;
class PaypalController extends Controller
{
    private $apiContext;
    private $secret;
    private $clientId;

    public function __construct()
    {
        if (Config('paypal.settings.mode')=='live'){
            $this->clientId=Config('paypal.live_client_id');
            $this->secret=Config('paypal.live_secret');
        }
        else{
            $this->clientId=Config('paypal.sandbox_client_id');
            $this->secret=Config('paypal.sandbox_secret');
        }
        $this->apiContext=new ApiContext(new OAuthTokenCredential($this->clientId,$this->secret));
        $this->apiContext->setConfig(config('paypal.settings'));
//        $paypal_configuration = \Config::get('paypal');
//        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_configuration['client_id'], $paypal_configuration['secret']));
//        $this->_api_context->setConfig($paypal_configuration['settings']);
    }

    public function index()
    {
        return view('dashboard.pay.pay_with_paypal');
    }

    public function payWithPaypal(Request $request)
    {
        $price = floatval($request->amount);
        $name = $request->name;
        $plan_id = $request->plan_id;
//        $type = $request->type;
        $time = $request->time;
//        return $request->all();
        // set Payer
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");
        //set Item
        $item = new Item();
        $item->setName($name.' Plan')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setDescription('Subscription term '.$time)
//            ->setSku("123123") // Similar to `item_number` in Classic API
            ->setPrice($price);
        // Item List
        $itemList=new ItemList();
        $itemList->setItems([$item]);
        // set Amount
        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal($price);
        //Transaction
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Done Subscription");
//            ->setInvoiceNumber(uniqid());
        //Redirect Urls
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(route('paypal.status',[$time,$plan_id,$price]))
            ->setCancelUrl(route('paypal.status',[$time,$plan_id,$price]));

        //payment
        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions([$transaction]);
        try {
            $payment->create($this->apiContext);
        }catch (PayPalConnectionException $ex){
//            die($ex);
            echo '<pre>';print_r(json_decode($ex->getData()));exit;
        }
        $paymentLink=$payment->getApprovalLink();
        return redirect($paymentLink);
    }
    public function status(Request $request,$time,$plan_id,$price){
//        return $time;
        if (empty($request->input('PayerID')) || empty($request->input('token'))){
            return redirect()->route('plan.index');
        }
        $paymentId=$_GET['paymentId'];
//        return $_GET['paymentId'];
        $payment= Payment::get($paymentId,$this->apiContext);
        $execution=new PaymentExecution();
        $execution->setPayerId($request->input('PayerID'));
        $result=$payment->execute($execution,$this->apiContext);
        if ($result->getState()=='approved'){
            DB::beginTransaction();
            try {
                $market_now=Market::query()->where(['type'=>'Admin','trader_id'=>Auth::user()->trader_id ])
                    ->first();
//        $plan=Plan::query()->where('id',$request->plan_id)->first();
                if ($time =='Year'){
                    $time=12;
                }
                if ($time =='6 Months'){
                    $time=6;
                }
                if ($time =='3 Months'){
                    $time=3;
                }
                if ($time =='Month'){
                    $time=1;
                }
                $trader_plan=TraderPlan::query()->where('trader_id',$market_now->id)->first();
                if ($trader_plan->end_date > now() &&$trader_plan->plan_id==$request->plan_id){
                    $trader_plan  ->update([
                        'plan_id'=>$request->plan_id,
                        'end_date'=>Carbon::parse($trader_plan->end_date)->addMonths($time)->toDateString(),
                        'time'=>$time,
                        'amount'=>floatval($request->amount),
                        'type'=>1,
                        'status'=>1,
                    ]);
                }
                elseif ($trader_plan->end_date <= now() &&$trader_plan->plan_id==$request->plan_id){
                    $trader_plan  ->update([
                        'plan_id'=>$request->plan_id,
                        'end_date'=>Carbon::today()->addMonths($time)->toDateString(),
                        'time'=>$time,
                        'amount'=>floatval($request->amount),
                        'type'=>1,
                        'status'=>1,
                    ]);
                }else{
                    $trader_plan  ->update([
                        'plan_id'=>$request->plan_id,
                        'end_date'=>Carbon::today()->addMonths($time)->toDateString(),
                        'time'=>$time,
                        'amount'=>floatval(floatval($request->amount)),
                        'type'=>1,
                        'status'=>1,
                    ]);
                }
                $coupon=CouponSubscription::query()->where('id',$request->coupon_id)->first();
                if($coupon){
                    CouponSubscriptionUse::query()->create([
                        'trader_id'=>Auth::user()->trader_id,
                        'coupon_id'=>$coupon->id,
                        'type'=>$coupon->type,
                        'coupon_value'=>$coupon->discount,

                    ]);
                }

                Market::query()->where('id',Auth::id())->update([
                    'plan_id'=>$trader_plan,
                    'status'=>1,
//                '$trader_plan'=>$trader_plan->id,
                ]);
                $amount=
                    \App\Models\Admin\Transaction::query()->create([
                        'user_id'=>Auth::id(),
                        'type_user'=>'Market',
                        'amount'=>$price,
                        'type'=>1,
                    ]);
//        return 'has';
//        Session::flash('success', 'Payment Successful !');
                DB::commit();
                $end_at=Carbon::today()->addMonths($time)->toDateString();
                return redirect()->route('plan.index')->with([
                    'success'=>__('Your subscription has been successfully renewed'),
                    'text'=>__('Your subscription has been successfully renewed until :').$end_at
                ]);
            }catch (\Throwable $e){
                DB::rollBack();
                throw $e;
            }
        }
        echo 'failed';
        die($result);
    }
}
