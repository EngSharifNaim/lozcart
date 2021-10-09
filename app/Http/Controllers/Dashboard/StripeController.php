<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe;
class StripeController extends Controller
{
    public function index(){

        $stripe = new \Stripe\StripeClient(
            env('STRIPE_SECRET')
        );
        $stripe_key = Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
//        $stripe->accounts->all(['limit' => 3,'stripe_account' => 'acct_1IMhYDRKZQKokiiP']);
//        dd($stripe->balanceTransactions->retrieve('acct_1IMhYDRKZQKokiiP',
//            []));
//        $balance = \Stripe\Balance::retrieve(
//            ['stripe_account' => 'acct_1IMhYDRKZQKokiiP']
//        );
        $paymentIntents= $stripe->charges->all([],['stripe_account' => Auth::user()->stripe_id]);
        $payouts= $stripe->payouts->all(['expand' => ['data.destination','data.balance_transaction']],['stripe_account' =>Auth::user()->stripe_id]
        );
//        $balanceTransactions = $stripe->balanceTransactions->retrieve(
//            'txn_1IKgPDICMZWuBwz96dWzWT8C',
//            []
//        );
//        return $payouts->data;
//        $d=[];
//        foreach ($payouts as $payout){
////            return $payout;
//            $v=$stripe->payouts->retrieve(
//                $payout->id,
//                [],
//
//            );
//            $d[]=$v;
//        }
//        return $d;
        $transactions= $stripe->balanceTransactions->all([

        ],['stripe_account' =>Auth::user()->stripe_id]);


//        $transactions = \Stripe\BalanceTransaction::all(
//            ['source'=> 'acct_1IMhYDRKZQKokiiP'], ['stripe_account' => 'acct_1IMhYDRKZQKokiiP']);
//        $charges=$stripe->charges->all([]);
//        $payment = \Stripe\paymentIntents::all(
//            ['source'=> 'acct_1IMhYDRKZQKokiiP'], ['stripe_account' => 'acct_1IMhYDRKZQKokiiP']);

//        dd($paymentIntents['data']);
//        dd($stripe->balanceTransactions->all(['limit' => 3],'acct_1IMhYDRKZQKokiiP'));
//        dd(\Stripe\Account::retrieve("acct_1IMhYDRKZQKokiiP"));
//        dd($stripe->accounts->retrieve(
//            'acct_1IMhYDRKZQKokiiP',
//            []
//        ));
//        return Response()->json(['f'=>$stripe]);

       $disputes= $stripe->disputes->all([],['stripe_account' =>'acct_1IMhYDRKZQKokiiP']);
        $orders  =$stripe->orders->all([],['stripe_account' =>'acct_1IMhYDRKZQKokiiP']);
//        return $paymentIntents;
//        $stripe = new \Stripe\StripeClient(
//            'sk_test_51IKT7DICMZWuBwz9gP2YzMM1v0fjfQ5LgWbSUntBiNNYkCpxnmBOFK6wYuJyWEKhAmntBp3b5t7bKNzBVjHsSAoL00CEnJk5e5'
//        );
//      $bank=  $stripe->customers->retrieveSource(
//            'cus_Jk06747xHyz90E',
//            'ba_1JD52ZICMZWuBwz9RuQgaAP5',
//            []
//        );
        $stripe = new \Stripe\StripeClient(
            'sk_test_51IKT7DICMZWuBwz9gP2YzMM1v0fjfQ5LgWbSUntBiNNYkCpxnmBOFK6wYuJyWEKhAmntBp3b5t7bKNzBVjHsSAoL00CEnJk5e5'
        );
//        $bank= $stripe->customers->allSources(
//            'cus_Jk06747xHyz90E',
//            ['object' => 'bank_account', 'limit' => 3]
//        );
        $bank=    $stripe->accounts->retrieveExternalAccount(
            'acct_1IMhYDRKZQKokiiP',
            'ba_1J20PBRKZQKokiiPyj8xe95M',
            []
        );

//        return $payouts;
        $countries=Country::all();
        return view('dashboard.settings.payments.stripe',compact('paymentIntents','payouts'
        ,'disputes','countries'));
    }
    public function get_orders(Request $request,$payment_id){
        ## Read value
//        return $status;
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        // Total records
        $totalRecords = Order::query()->where(['trader_id'=>Auth::id(),'payment_id'=>$payment_id])->select('count(*) as allcount')->count();
        $totalRecordswithFilter = Order::query()->where(['trader_id'=>Auth::id(),'payment_id'=>$payment_id])->select('count(*) as allcount')
            ->where('order_no', 'like', '%' .$searchValue . '%')->count();

        // Fetch records
        $records = Order::query()->where(['trader_id'=>Auth::id(),'payment_id'=>$payment_id])->with(['user','order_address','payment','shipping'])->orderBy($columnName,$columnSortOrder)
            ->where('orders.order_no', 'like', '%' .$searchValue . '%')
//            ->select('name','file_no','address','mobile','age','id')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();
//return $records;
        foreach($records as $record){


            $data_arr[] = array(
                "id" => $record->id,
                "order_no" => $record->order_no,
                "client_name" => $record->user->name,
                "country" => $record->order_address->country,
                "order_date" => $record->created_at->diffForHumans(),
                "payment" => $record->payment,
                "shipping" => $record->shipping,
                "total_price" => $record->total_price,
                "status" => $record->status,

            );
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );

        echo json_encode($response);
        exit;
    }
    public function close_dispute($id){
        $stripe = new \Stripe\StripeClient(
            env('STRIPE_SECRET')
        );
        $stripe_key = Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $stripe->disputes->close(
           $id,
           []
           ,['stripe_account' =>Auth::user()->stripe_id]
        );
        return response()->json(['success'=>__('The process has successfully')]);
    }
    public function reply_dispute(Request $request,$id){
//        return $request->all();
        $stripe = new \Stripe\StripeClient(
            env('STRIPE_SECRET')
        );
        $stripe_key = Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $fp = fopen($request->photo, 'r');
      $file=  $stripe->files->create([
            'purpose' => 'dispute_evidence',
            'file' => $fp
        ]);
        $stripe->disputes->update(
           $id,
           ['evidence'=>[
            "billing_address"=> $request->billing_address_1.'/'.$request->billing_address_2.'/'.$request->billing_address_city.'/'.$request->country_id,
            "customer_email_address"=> $request->email,
            "customer_name"=> $request->name,
            "customer_purchase_ip"=> $request->ip(),
            "customer_signature"=> $file->id,
            "product_description"=>$request->product_description,
            "shipping_date"=>$request->shipping_date,
            ]
           ]
           ,['stripe_account' =>Auth::user()->stripe_id]
        );
        return response()->json(['success'=>__('The process has successfully')]);
    }
}
