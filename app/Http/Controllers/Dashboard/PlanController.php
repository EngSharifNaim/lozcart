<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin\BankTransfer;
use App\Models\Admin\BankTransferAccount;
use App\Models\Admin\Card;
use App\Models\Admin\CountryStore;
use App\Models\Admin\CouponSubscription;
use App\Models\Admin\CouponSubscriptionUse;
use App\Models\Admin\Faq;
use App\Models\Admin\Feature;
use App\Models\Admin\Market;
use App\Models\Admin\Plan;
use App\Models\Admin\TraderPlan;
use App\Models\Admin\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Stripe;

class PlanController extends Controller
{
    public function index(){
//        DB::beginTransaction();
//        try {
//        $card=Card::query()->where('user_id',Auth::id())->latest()->first();
//        $stripe = new \Stripe\StripeClient(
//            env('STRIPE_KEY')
//        );
//
//        $stripeToken=  $stripe->tokens->create([
//            'card' => [
//                'number' => $card->no,
//                'exp_month' => $card->month,
//                'exp_year' => $card->year,
//                'cvc' => $card->cvc,
//            ],
//        ]);
//        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
//        $result=Stripe\Charge::create ([
//            "amount" => 100*100,
//            "currency" => 'USD',
//            "source" => $stripeToken->id,
//            "description" => "test",
//        ]);
//        DB::commit();
//        } catch (\Throwable $e) {
//            DB::rollBack();
////            throw $e;
//            return  response()->json(['msg'=>$e->getMessage(),'code'=>$e->getCode()]);
//        }
//        return $result->status;
//return $markets;
        $first_plan=Plan::query()->where('id',1)->with('services')->first();
        $second_plan=Plan::query()->where('id',2)->with('services')->first();
        $third_plan=Plan::query()->where('id',3)->with('services')->first();
        $features=Feature::query()->with('feature_plan')->get();
        $faqs=Faq::query()->where('plan_show',1)->get();
//        return $feature;
        return view('dashboard.plans.index',compact('first_plan','second_plan',
            'third_plan','features','faqs'));
    }
    public function subscription(Request $request,$id){

//        return $request;
        if ($request->type=='onlinePayment'){
            $plan=Plan::query()->where('id',$id)->first();
//        return $plan;
            $country_store=CountryStore::query()->where(['trader_id'=>Auth::id(),'is_main'=>1])->with('country')->first();

            if ($request->option_id ==1){
                $price=$plan->discount_month;
                $type_ar='شهر';
                $type='Month';
            }
            if ($request->option_id ==2){
                $price=$plan->discount_month *3;
                $type_ar='3 شهور';
                $type='3 Months';
            }
            if ($request->option_id ==3){
                $price=$plan->discount_month *6;
                $type_ar='6 شهور';
                $type='6 Months';
            }
            if ($request->option_id ==4){
                $price=$plan->discount_year;
                $type='Year';
                $type_ar='سنة';
            }
            $cards=Card::query()->where('user_id',Auth::id())->get();
            return view('dashboard.plans.subscription',compact('request','price','type',
                'type_ar','country_store','plan','cards'));
        }
        if ($request->type=='payPal'){
            $plan=Plan::query()->where('id',$id)->first();
//        return $plan;
            $country_store=CountryStore::query()->where(['trader_id'=>Auth::id(),'is_main'=>1])->with('country')->first();

            if ($request->option_id ==1){
                $price=$plan->discount_month;
                $type_ar='شهر';
                $type='Month';
            }
            if ($request->option_id ==2){
                $price=$plan->discount_month *3;
                $type_ar='3 شهور';
                $type='3 Months';
            }
            if ($request->option_id ==3){
                $price=$plan->discount_month *6;
                $type_ar='6 شهور';
                $type='6 Months';
            }
            if ($request->option_id ==4){
                $price=$plan->discount_year;
                $type='Year';
                $type_ar='سنة';
            }
            $cards=Card::query()->where('user_id',Auth::id())->get();
            return view('dashboard.plans.subscription3',compact('request','price','type',
                'type_ar','country_store','plan','cards'));
        }
        if ($request->type=='bankTransfer'){
            $plan=Plan::query()->where('id',$id)->first();
//        return $plan;
            $country_store=CountryStore::query()->where(['trader_id'=>Auth::id(),'is_main'=>1])->with('country')->first();
            $banks=BankTransferAccount::all();
            if ($request->option_id ==1){
                $price=$plan->discount_month;
                $type_ar='شهر';
                $type='Month';
            }
            if ($request->option_id ==2){
                $price=$plan->discount_month *3;
                $type_ar='3 شهور';
                $type='3 Months';
            }
            if ($request->option_id ==3){
                $price=$plan->discount_month *6;
                $type_ar='6 شهور';
                $type='6 Months';
            }
            if ($request->option_id ==4){
                $price=$plan->discount_year;
                $type='Year';
                $type_ar='سنة';
            }
            $cards=Card::query()->where('user_id',Auth::id())->get();
            return view('dashboard.plans.subscription2',compact('request','price','type',
                'type_ar','country_store','plan','cards','banks'));
        }
    }
    public function stripePost(Request $request)
    {
//        return $request->all();
        DB::beginTransaction();
        try {
            $market_now=Market::query()->where(['type'=>'Admin','trader_id'=>Auth::user()->trader_id ])
                ->first();
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $charge=  Stripe\Charge::create ([
                "amount" =>floatval($request->amount) *100,
                "currency" => 'USD',
                "source" => $request->stripeToken,
                "description" => "This payment is testing purpose of lozcart.com",
            ]);
//      return $charge;
            if ($charge->status=='succeeded'){
                Card::query()->updateOrCreate([
                    'no'=>$request->no,
                    'user_id'=>Auth::id(),
                ],[

                    'name'=>$request->name,

                    'cvc'=>$request->cvc,
                    'month'=>$request->month,
                    'year'=>$request->year,
                ]);
//        $plan=Plan::query()->where('id',$request->plan_id)->first();
                if ($request->time =='Year'){
                    $time=12;
                }
                if ($request->time =='6 Months'){
                    $time=6;
                }
                if ($request->time =='3 Months'){
                    $time=3;
                }
                if ($request->time =='Month'){
                    $time=1;
                }

                $trader_plan=TraderPlan::query()->where('trader_id',Auth::user()->trader_id)->first();
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
                        'amount'=>floatval($request->amount),
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
                // return $trader_plan;
                Market::query()->where('trader_id',Auth::user()->trader_id)->update([
                    'plan_id'=>$trader_plan->id,
                    'status'=>1,
//                '$trader_plan'=>$trader_plan->id,
                ]);
                $amount= Transaction::query()->create([
                    'user_id'=>Auth::id(),
                    'type_user'=>'Market',
                    'amount'=>floatval($request->amount),
                    'type'=>1,
                ]);
                $end_at=Carbon::today()->addMonths($time)->toDateString();
            }

            DB::commit();
            if ($charge->status=='succeeded'){
                return redirect()->route('plan.index')->with([
                    'success'=>__('Your subscription has been successfully renewed'),
                    'text'=>__('Your subscription has been successfully renewed until :').$end_at
                ]);
            }

        }catch (\Throwable $e){
            DB::rollBack();
            throw $e;
        }
//        return redirect()->route('plan.index');
    }
    public function stripePostSubscription(Request $request)
    {
//        dd($request);
//        return Carbon::today()->addMonths('6')->toDateString();
        DB::beginTransaction();
        try {
//            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
//            Stripe\Charge::create ([
//                "amount" => $request->amount*100,
//                "currency" => 'USD',
//                'application_fee_amount' => 123,
//                "source" => $request->stripeToken,
//                "description" => "This payment is testing purpose of application_fee_amount",
//            ], ['stripe_account' => 'acct_1IMhYDRKZQKokiiP']);
            $stripe = new \Stripe\StripeClient(
                env('STRIPE_SECRET')
            );
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
//      $charge=  Stripe\Charge::create ([
//            "amount" => $request->amount*100,
//            "currency" => 'USD',
//            "source" => $request->stripeToken,
//            "description" => "This payment is testing purpose of lozcart.com",
//        ]);
            $payment=  $stripe->paymentMethods->create([
                'type' => 'card',
                'card' => [
                    'number' => $request->no,
                    'exp_month' => $request->month,
                    'exp_year' => $request->year,
                    'cvc' => $request->cvc,
                ],
            ]);
            $customer=    $stripe->customers->create([
                'description' => 'My First Test Customer (created for API docs)',
                'name' => Auth::user()->owner_name,
                'phone' => Auth::user()->mobile,
                'email' => Auth::user()->email,
                'payment_method' => $payment->id,
                'invoice_settings' => [
                    'default_payment_method' => $payment->id,
                ],
            ]);
            $subscription=  $stripe->subscriptions->create([
                'customer' => $customer->id,
                'items' => [
                    ['price' => 'price_1J6W4wICMZWuBwz9dp0L3H85'],
                ],
            ]);
//      return $subscription;
            if ($subscription->status=='active'){
                Card::query()->updateOrCreate([
                    'no'=>$request->no,
                    'user_id'=>Auth::id(),
                ],[

                    'name'=>$request->name,

                    'cvc'=>$request->cvc,
                    'month'=>$request->month,
                    'year'=>$request->year,
                ]);
//        $plan=Plan::query()->where('id',$request->plan_id)->first();
                if ($request->time =='Year'){
                    $time=12;
                }
                if ($request->time =='6 Months'){
                    $time=6;
                }
                if ($request->time =='3 Months'){
                    $time=3;
                }
                if ($request->time =='Month'){
                    $time=1;
                }

                $trader_plan=TraderPlan::query()->where('trader_id',Auth::id())->update([
                    'plan_id'=>$request->plan_id,
                    'end_date'=>Carbon::today()->addMonths($time)->toDateString(),
                    'time'=>$time,
                    'amount'=>$request->amount,
                    'type'=>1,
                    'status'=>1,
                ]);
                Market::query()->where('id',Auth::id())->update([
                    'plan_id'=>$trader_plan,
                    'status'=>1,
//                '$trader_plan'=>$trader_plan->id,
                ]);
                $amount= Transaction::query()->create([
                    'user_id'=>Auth::id(),
                    'type_user'=>'Market',
                    'amount'=>$request->amount,
                    'type'=>1,
                ]);
                $end_at=Carbon::today()->addMonths($time)->toDateString();
            }

            DB::commit();
            if ($subscription->status=='active'){
                return redirect()->route('plan.index')->with([
                    'success'=>__('Your subscription has been successfully renewed'),
                    'text'=>__('Your subscription has been successfully renewed until :').$end_at
                ]);
            }

        }catch (\Throwable $e){
            DB::rollBack();
            throw $e;
        }
//        return redirect()->route('plan.index');
    }
    public function bankTransfer(Request $request)
    {
//        return $request->all();
        $validator = Validator::make($request->all(), [
            'image' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();

            $input=$request->all();

            return response(["responseJSON" => $errors,"input"=>$input, "message" => 'تاكد من صحة البيانات وملئ جميع الحقول'], 422);
        }

        if ($validator->passes()) {
            DB::beginTransaction();
            try {
                $market_now=Market::query()->where(['type'=>'Admin','trader_id'=>Auth::user()->trader_id ])
                    ->first();
                if ($request->hasfile('image') ) {
                    $photo = $request->file('image');
                    $photo_name = time().'.' .$photo->getClientOriginalExtension();
                    $photo->move(public_path('uploads/bankTransfers/'), $photo_name);
                }

//        $plan=Plan::query()->where('id',$request->plan_id)->first();
                if ($request->time == 'Year') {
                    $time = 12;
                }
                if ($request->time == '6 Months') {
                    $time = 6;
                }
                if ($request->time == '3 Months') {
                    $time = 3;
                }
                if ($request->time == 'Month') {
                    $time = 1;

                }
                BankTransfer::query()->create([
                    'trader_id'=>Auth::id(),
                    'amount'=>floatval($request->amount),
                    'currency'=>$request->currency,
                    'image'=>$photo_name,
                ]);
                $trader_plan=TraderPlan::query()->where('trader_id',$market_now->id)->first();
                if ($trader_plan->end_date > now() &&$trader_plan->plan_id==$request->plan_id){
                    $trader_plan  ->update([
                        'plan_id'=>$request->plan_id,
                        'end_date'=>Carbon::parse($trader_plan->end_date)->addMonths($time)->toDateString(),
                        'time'=>$time,
                        'amount'=>floatval($request->amount),
                        'type' => '2',
                        'status' => '2',
                    ]);
                }
                elseif ($trader_plan->end_date <= now() &&$trader_plan->plan_id==$request->plan_id){
                    $trader_plan  ->update([
                        'plan_id'=>$request->plan_id,
                        'end_date'=>Carbon::today()->addMonths($time)->toDateString(),
                        'time'=>$time,
                        'amount'=>floatval($request->amount),
                        'type' => '2',
                        'status' => '2',
                    ]);
                }else{
                    $trader_plan  ->update([
                        'plan_id'=>$request->plan_id,
                        'end_date'=>Carbon::today()->addMonths($time)->toDateString(),
                        'time'=>$time,
                        'amount'=>floatval($request->amount),
                        'type' => '2',
                        'status' => '2',
                    ]);
                }

                Transaction::query()->create([
                    'user_id'=>Auth::id(),
                    'type_user'=>'Market',
                    'amount'=>floatval($request->amount),
                    'type'=>2,
                    'status'=>1,
                ]);
                $coupon=CouponSubscription::query()->where('id',$request->coupon_id)->first();
                if($coupon){
                    CouponSubscriptionUse::query()->create([
                        'trader_id'=>Auth::user()->trader_id,
                        'coupon_id'=>$coupon->id,
                        'type'=>$coupon->type,
                        'coupon_value'=>$coupon->discount,

                    ]);
                }
                Market::query()->where('id', Auth::id())->update([
                    'plan_id' => $trader_plan,
                    'status' => 3,

//                '$trader_plan'=>$trader_plan->id,
                ]);
//        return 'has';
//        Session::flash('success', 'Payment Successful !');
                DB::commit();
                return redirect()->route('plan.index')->with([
                    'success'=>__('Your application has been submitted successfully'),
                    'text'=>__('Your request will be approved as soon as possible')
                ]);
//                return redirect()->route('plan.index');
            } catch (\Throwable $e) {
                DB::rollBack();
                throw $e;
            }
//            return response()->json(['success'=>"تمت العملية بنجاح",'status'=>1]);
        }
//        return redirect()->route('plan.index');
    }


    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $card =Card::find($id);

            $card->delete();

            DB::commit();
            if($card){
                $arr = array('msg' => "تم حذف البطاقة", 'status' => true);
            }
        }
        catch (\Throwable $e){
            DB::rollBack();
            throw $e;
            $arr = array('msg' => 'هناك بعض الاخطاء حاول مرة اخرى', 'status' => false);
        }

        return Response()->json($arr);

    }
    public function get_card($id){
        $card=Card::query()->where('id',$id)->first();
        return response()->json(['success'=>"تمت العملية بنجاح",'data'=>$card]);
    }
}
