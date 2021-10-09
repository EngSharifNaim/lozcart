<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function index(){
        $orders=Order::query()->where('trader_id',Auth::id());
        return view('dashboard.orders.index',compact('orders'));


    }
    public function get_orders(Request $request){

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
        $totalRecords = Order::query()->where('trader_id',Auth::id())->select('count(*) as allcount')->count();
        $totalRecordswithFilter = Order::query()->where('trader_id',Auth::id())->select('count(*) as allcount')
            ->where('order_no', 'like', '%' .$searchValue . '%')->count();

        // Fetch records
        $records = Order::query()->where('trader_id',Auth::id())->with(['user','currency','order_address','payment','shipping'])->orderBy($columnName,$columnSortOrder)
            ->where('orders.order_no', 'like', '%' .$searchValue . '%')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();
        foreach($records as $record){


            $data_arr[] = array(
                "id" => $record->id,
                "user_id" => $record->user_id,
                "order_no" => $record->order_no,
                "client_name" => $record->user->name,
                "country" => $record->order_address->country,
                "currency" => $record->currency,
                "order_date" => $record->created_at->diffForHumans(),
                "payment" => $record->payment,
                "payment_type" => $record->payment_type,
                "shipping" => $record->shipping,
                "total_price" => $record->total_price +$record->shipping->price,
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
    public function show($id){
        $order=Order::query()->where('id',$id)
            ->with(['user','market','order_address','payment','use_coupon','shipping','currency'])->first();
//        return $order;
        return view('dashboard.orders.show',compact('order'));
    }
    public function showOrder($order_no){
        $order=Order::query()->where(['order_no'=>$order_no,'trader_id'=>Auth::id()])
            ->with(['user','market','order_address','payment','use_coupon','shipping','currency'])->first();
//        return $order;
        return view('dashboard.orders.show',compact('order'));
    }
    public function status(Request $request,$id){
        $order=  Order::find($id);
        $validator = Validator::make($request->all(), [
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response(["responseJSON" => $errors, "message" => 'هناك خطاء يرجى ملى جميع الحقول '], 422);
        }
        $data = $request->all();




        if ($validator->passes()) {
            $order ->update($data);
            $order_full= Order::query()->where('id',$id)->with(['user','market','order_address','payment','use_coupon','shipping','currency'])->first();
            Mail::to($order_full->user->email)->send(new \App\Mail\Order($order_full));
            return response()->json([
                'message_ar'=>"تم تحديث حالة الطلب",
                'message_en'=>"Order Status have been updated",
                'status'=>1

            ]);
        }

    }
    public function confirm_delivering(Request $request,$id){

        $order=  Order::find($id);
        if (isset($request->need_tracking_no)){
            $order ->update([
                'status'=>3,
                'need_tracking_no'=>0,
            ]);
        }
        else{
            $order ->update([
                'shipping_name'=>$request->shipping_name,
                'tracking_number'=>$request->tracking_number,
                'status'=>3,
                'need_tracking_no'=>1,
            ]);
        }

            $order_full= Order::query()->where('id',$id)->with(['user','market','order_address','payment','use_coupon','shipping','currency'])->first();
            Mail::to($order_full->user->email)->send(new \App\Mail\Order($order_full));
            return response()->json([
                'message_ar'=>"تم تحديث حالة الطلب",
                'message_en'=>"Order Status have been updated",
                'status'=>1

            ]);


    }
    public function delete_all(Request $request)
    {
        $ids = $request->ids;
//        return $ids;
        $orders= Order::query()->whereIn('id',explode(",",$ids))->get();
        foreach ($orders as $order){
            $order->delete();
        }


        $arr = array(
            'message_ar'=>"تمت العملية بنجاح",
            'message_en'=>"operation accomplished successfully",
            'status' => true
        );

        return Response()->json($arr);

    }
    public function delete($id)
    {
        $order =Order::find($id);
        // return $user;
        $order->delete();
        $arr = array('message_ar'=>"هناك بعض الاخطاء حاول مرة اخرى",
            'message_en'=>"There are some errors, try again",
            'status' => false);
        if($order){
            $arr = array(
                'message_ar'=>"تمت العملية بنجاح",
                'message_en'=>"operation accomplished successfully",
                'status' => true
            );
        }
        return Response()->json($arr);

    }
}
