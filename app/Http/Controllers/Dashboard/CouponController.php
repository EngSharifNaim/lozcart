<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin\Coupon;
use App\Models\Admin\CouponSubscription;
use App\Models\Admin\CouponSubscriptionUse;
use App\Models\Admin\CouponUse;
use App\Models\Admin\TypeCoupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CouponController extends Controller
{
    public function index(){
        $type_coupons=TypeCoupon::all();
        return view('dashboard.coupons.index',compact('type_coupons'));


    }
    public function get_coupons(Request $request){
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
        $totalRecords = Coupon::query()->where('market_id',Auth::id())->select('count(*) as allcount')->count();
        $totalRecordswithFilter = Coupon::query()->where('market_id',Auth::id())->select('count(*) as allcount')
            ->where('code', 'like', '%' .$searchValue . '%')->count();

        // Fetch records
        $records = Coupon::query()->where('market_id',Auth::id())->with(['coupon_use','coupon_type'])->orderBy($columnName,$columnSortOrder)
            ->where('coupons.code', 'like', '%' .$searchValue . '%')
//            ->select('name','file_no','address','mobile','age','id')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();

        foreach($records as $record){

            if (App::isLocale('en')){
                $type=$record->coupon_type->name;
            }else{
                $type=$record->coupon_type->name_ar;

            }
            $data_arr[] = array(
                "id" => $record->id,
                "code" => $record->code,

                "type" => $type,
                "type_ar" => $record->coupon_type->name_ar,
                "count_use" => $record->coupon_use->count(),
                "end_at" => $record->end_at,
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
    public function status(Request $request,$id){
        $coupon=  Coupon::find($id);
        $validator = Validator::make($request->all(), [
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response(["responseJSON" => $errors, "message" => __('There is an error Please fill in all fields')], 422);
        }


        if ($validator->passes()) {
            $data = $request->all();
            unset($data['_token']);

            $coupon->update($data);
            return response()->json(['success'=>__('The process has successfully')]);
        }

    }
    public function store(Request $request)
    {
        $messages = [
            'code.unique' => __('This code already exists'),
        ];

        $validator = Validator::make($request->all(), [
            'code'=>['required', Rule::unique('coupons')->where(function ($query) use ($request) {
                return $query->where('market_id', Auth::id());
            })],
            'type' => 'required',
            'end_at' => 'required',
            'is_except_offers' => 'required',
            'min_order_grand_total' => 'required',
            'uses_times_for_user' => 'required',
            'countuse' => 'required',
        ],$messages);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $input=$request->all();
            return response(["responseJSON" => $errors,"input"=>$input, "message" => __('There is an error Please fill in all fields')], 422);
        }
        if ($validator->passes()) {
            $data=$request->all();
            $data['market_id']=Auth::id();
            Coupon::query()->create($data);

            return response()->json(['success'=>__('The process has successfully')]);


        }

    }
    public function edit($id){
        $coupon=Coupon::query()->find($id);
        $type_coupons=TypeCoupon::all();
        return view('dashboard.coupons.edit',compact('type_coupons','coupon'));

    }
    public function update(Request $request,$id){
//        return $request->all();
        $coupon=Coupon::query()->find($id);
        $validator = Validator::make($request->all(), [
            'code'=>['required', Rule::unique('coupons')->where(function ($query) use ($request) {
                return $query->where('market_id', Auth::id())->where('code','!=',$request->code);
            })],
            'type' => 'required',
            'end_at' => 'required',
            'is_except_offers' => 'required',
            'min_order_grand_total' => 'required',
            'uses_times_for_user' => 'required',
            'countuse' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            $input=$request->all();

            return response(["responseJSON" => $errors,"input"=>$input, "message" => __('There is an error Please fill in all fields')], 422);
        }

        if ($validator->passes()) {
            DB::beginTransaction();
            try {
                $data=$request->all();
                $coupon->update($data);


                DB::commit();
            }
            catch (\Throwable $e){
                DB::rollBack();
                throw $e;
            }
            return response()->json(['success'=>__('The process has successfully'),'status'=>1]);
        }
    }
    public function delete_all(Request $request)
    {
        $ids = $request->ids;
//        return $ids;
        Coupon::query()->whereIn('id',explode(",",$ids))->delete();
        CouponUse::query()->whereIn('coupon_id',explode(",",$ids))->delete();

        $arr = array('msg' => __('The selected selected coupons have been deleted'), 'status' => true);

        return Response()->json($arr);
    }
    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $coupon =Coupon::find($id);
            // return $user;
            CouponUse::query()->where('coupon_id',$id)->delete();
            $coupon->delete();

            DB::commit();
            if($coupon){
                $arr = array('msg' => __('Coupon has been removed'), 'status' => true);
            }
        }
        catch (\Throwable $e){
            DB::rollBack();
            throw $e;
            $arr = array('msg' => __('There are some errors, try again'), 'status' => false);
        }

        return Response()->json($arr);

    }
    public function checkSubscriptionCoupon(Request $request){
        $coupon=CouponSubscription::query()->where(['code'=>$request->promo_code,'status'=>1])
            ->first();
//        return $coupon;
        if ($coupon){
            $coupon_use_all=CouponSubscriptionUse::query()->where('coupon_id',$coupon->id)->get();
            $coupon_use_user=CouponSubscriptionUse::query()->where(['coupon_id'=>$coupon->id,'trader_id'=>Auth::user()->trader_id])->get();
//        return $coupon_use_user->count()<$coupon->uses_times_for_user;

            if($coupon->end_at >now()){
                if ($coupon_use_user->count()<$coupon->uses_times_for_user && $coupon_use_all->count()<$coupon->countuse){

                    $coupon_type=$coupon->type;
                    $coupon_id=$coupon->id;
//        return $sub_total;
//          value discount
                    if($coupon_type == 2){
                          $coupon_value= $request->price - $coupon->discount;
                        $coupon = $coupon->discount .' USD';
                        $final_price= $coupon_value .' USD';

                    }
//        percentage% discount
                    if($coupon_type == 1){
                        $coupon_value=$request->price*($coupon->discount/100)   ;
                        $coupon = $coupon->discount.' %';
                        $final_price= $request->price-$coupon_value .' USD';
                    }







//        return $final_price;
                    return response()->json([
                        'code' => 200,
                        'status' => 1,
                        'message' => __('Discount value added'),
                        'coupon' => $coupon,
                        'coupon_type' => $coupon_type,
                        'coupon_id' => $coupon_id,
                        'final_price'=>$final_price
                    ]);
                }
                if ($coupon_use_user->count()>=$coupon->uses_times_for_user || $coupon_use_all->count()>=$coupon->countuse){
                    return response()->json([
                        'code' => 400,
                        'status' => 0,
                        'message' => __('This code is invalid'),
                    ]);
                }
            }else{
                return response()->json([
                    'code' => 400,
                    'status' => 0,
                    'message' => __('This code is invalid'),
                ]);
            }
        }else{
            return response()->json([
                'code' => 400,
                'status' => 0,
                'message' => __('This code does not exist'),
            ]);
        }

    }
}
