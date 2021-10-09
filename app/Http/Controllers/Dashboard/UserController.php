<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin\AdditionalSetting;
use App\Models\Admin\Admin;
use App\Models\Admin\City;
use App\Models\Admin\Country;
use App\Models\Admin\Market;
use App\Models\Admin\UserAddress;
use App\Models\User;
use App\Models\Admin\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Clients',
            ['only' => ['index']]);
        $this->middleware('permission:Create Client',
            ['only' => ['create','store']]);
        $this->middleware('permission:Edit Client',
            ['only' => ['edit','update']]);
        $this->middleware('permission:Delete Client',
            ['only' => ['destroy']]);
        $this->middleware('permission:Suspended and Activate Client',
            ['only' => ['status']]);

    }
    public function index(){
        $countries=Country::all();
            return view('dashboard.users.index',compact('countries'));


    }
    public function get_users(Request $request){
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
        $totalRecords = User::query()->where(['trader_id'=>Auth::id()])
            ->select('count(*) as allcount')->count();
        $totalRecordswithFilter = User::query()->where(['trader_id'=>Auth::id()])
            ->select('count(*) as allcount')
            ->where('name', 'like', '%' .$searchValue . '%')->count();

        // Fetch records
        $records = User::query()->where(['trader_id'=>Auth::id()])->with(['orders','country'])
            ->orderBy($columnName,$columnSortOrder)
            ->where('users.name', 'like', '%' .$searchValue . '%')
//            ->select('name','file_no','address','mobile','age','id')
            ->skip($start)
            ->take($rowperpage)
            ->get();
//return $records;
        $data_arr = array();

        foreach($records as $record){


            $data_arr[] = array(
                "id" => $record->id,
                "name" => $record->name,
                "image" => $record->photo,
                "mobile" => $record->mobile,
                "email" => $record->email,
                "country" => $record->country,
                "order_count" => $record->orders->count(),
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

    public function get_user_address(Request $request,$id){
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
        $totalRecords = UserAddress::query()->where(['user_id'=>$id])
            ->select('count(*) as allcount')->count();
        $totalRecordswithFilter = UserAddress::query()->where(['user_id'=>$id])
            ->select('count(*) as allcount')
            ->where('title', 'like', '%' .$searchValue . '%')->count();

        // Fetch records
        $records = UserAddress::query()->where(['user_id'=>$id])
            ->orderBy($columnName,$columnSortOrder)
            ->where('user_addresses.title', 'like', '%' .$searchValue . '%')
//            ->select('name','file_no','address','mobile','age','id')
            ->skip($start)
            ->take($rowperpage)
            ->get();
//return $records;
        $data_arr = array();

        foreach($records as $record){


            $data_arr[] = array(
                "id" => $record->id,
                "name" => $record->title,
                "mobile" => $record->mobile,
                "address" => $record->details,
                "city" => $record->city,
                "status" => $record->status,
                "location_long" => $record->location_long,
                "location_lat" => $record->location_lat,

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
    public function get_cities(Request $request)
    {
        $cities = City::where('country_id',$request->country_id)->get();
        return response()->json($cities);
    }
    public function store(Request $request)
    {
//        return $request->all();
        $messages = [
            'password_confirmation.same' => 'كلمة المرور غير متطابقة',
            'password.required' => 'الرجاء ادخال كلمة المرور',
        ];

        $validator = Validator::make($request->all(), [
            'password' => 'required|same:password|min:6',
            'password_confirmation' => 'required|same:password|min:6',
            'name' => 'required',
            'email' => 'required|unique:users',
            'mobile' => 'required|unique:users',
            'country_id' => 'required',
        ], $messages);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $input=$request->all();
            return response(["responseJSON" => $errors,"input"=>$input, "message" => 'يرجي التأكد من صحة البيانات وملئ جميع الحقول'], 422);
        }
        if ($validator->passes()) {

            $password = $request->password;
           User::query()->create([
               'name'=>$request->name,
               'email'=>$request->email,
               'mobile'=>$request->mobile,
               'country_id'=>$request->country_id,
               'trader_id'=>Auth::id(),
               'password'=>$password,
           ]);

            return response()->json(['success'=>__('The process has successfully')]);


        }

    }
    public function create(){
        $roles = Role::pluck('name','name')->all();

                return view('dashboard.users.add', compact(  'roles'));

    }
    public function edit($id){
        $user=User::query()->findOrFail($id);
        $countries=Country::all();
        return view('dashboard.users.edit',compact('user','countries'));

    }
//    public function store(Request $request){
//        $validator = Validator::make($request->all(), [
////            'en_name' => 'required',
//            'name' => 'required',
//            'mobile' => 'required|unique:admins',
//            'email' => 'required|unique:admins',
//        ]);
//        if ($validator->fails()) {
//            $errors = $validator->errors();
//            $input=$request->all();
//            return response(["responseJSON" => $errors,"input"=>$input, "message" => 'يرجي التأكد من صحة البيانات وملئ جميع الحقول'], 422);
//        }
//
//        $data = $request->all();
//        $password ='123123123';
//        $data['password'] = bcrypt($password);
//        $data['type'] = 'Staff';
//        $data['role_name'] = $request->type;
//        unset($data['_token']);
//
//
//        if ($validator->passes()) {
//
//            $user = Admin::query()->create($data);
//            $user->assignRole($request->input('type'));
//
//            return response()->json(['success'=>"تمت العملية بنجاح"]);
//        }
//    }
    public function status(Request $request,$id){
        $user=  Admin::find($id);
        $validator = Validator::make($request->all(), [
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response(["responseJSON" => $errors, "message" => 'هناك خطاء يرجى ملى جميع الحقول '], 422);
        }
        $data = $request->all();
        unset($data['_token']);

        $user=  Admin::query()->where('id', $id)
            ->update($data);

        if ($validator->passes()) {
            return response()->json(['success'=>"تم تحديث حالة المستخدم"]);
        }

    }
    public function checkEmailMobile(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:traders',
            'mobile' => 'required|unique:traders',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response(["responseJSON" => $errors, "message" => 'هناك خطاء يرجى ملى جميع الحقول '], 422);
        }

        if ($validator->passes()) {

                return response()->json(['success'=>"لا يوجد مستخدم يحمل هذه البيانات"],200);

        }

    }
    public function checkLink(Request $request){
//return $request->all();
        $validator = Validator::make($request->all(), [
            'link' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response(["responseJSON" => $errors, "message" =>  __('There is a store with the same name')], 422);
        }

        if ($validator->passes()) {
            $market=Market::query()->where('link',$request->link)->first();
            if ($market){
                return response()->json([
                    'message'=>__('Sorry'),
                    'errors'=>[__('There is a store with the same name')],
                    'status'=> 0,
                    'status_code'=> 0,
                ],200);
            }
                return response()->json([
                    'success'=>'<span class="success"><span class="far fa-check-circle"></span> '. __('available') .'</span>',
                    'status'=> 1],200);

        }

    }
    public function checkLinkMyStore(Request $request,$id){
//return $request->all();
        $validator = Validator::make($request->all(), [
            'link' => 'required|unique:traders,link,'.$id,
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response(["responseJSON" => $errors, "message" => 'يوجد متجر يحمل نفس الاسم '], 422);
        }

        if ($validator->passes()) {

                return response()->json([
                    'success'=>'<span class="success"><span class="far fa-check-circle"></span> متوفر </span>',
                    'status'=> 1],200);

        }

    }
    public function address_store(Request $request,$id){
//        return $request->all();
        $user = User::find($id);
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'details' => 'required',
            'mobile' => 'required',
            'country_id' => 'required',
            'city' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'postal_code' => 'required',
            'state' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            $input=$request->all();
            return response(["responseJSON" => $errors,"input"=>$input, "message" => 'يرجي التأكد من صحة البيانات وملئ جميع الحقول'], 422);
        }

        if ($validator->passes()) {
            UserAddress::query()->create([
                'title'=>$request->title,
                'details'=>$request->details,
                'mobile'=>$request->mobile,
                'city'=>$request->city,
                'state'=>$request->state,
                'postal_code'=>$request->postal_code,
                'location_long'=>$request->lng,
                'location_lat'=>$request->lat,
                'user_id'=>$id,
            ]);
            return response()->json(['success'=>"تمت العملية بنجاح"]);
        }
    }
    public function update(Request $request,$id){
        $user = User::find($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mobile' => 'required|unique:users,mobile,'.$id,
            'email' => 'required|unique:users,email,'.$id,
            'country_id' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            $input=$request->all();
            return response(["responseJSON" => $errors,"input"=>$input, "message" => 'يرجي التأكد من صحة البيانات وملئ جميع الحقول'], 422);
        }
        $data = $request->all();
        unset($data['_token']);
        if ($validator->passes()) {
            $user->update($data);
            return response()->json(['success'=>"تمت العملية بنجاح"]);
        }
    }
    public function update_password(Request $request,$id)
    {
        $messages = [
            'password_confirmation.same' => 'كلمة المرور غير متطابقة',
            'password.required' => 'الرجاء ادخال كلمة المرور',
        ];

        $validator = Validator::make($request->all(), [
            'password' => 'required|same:password|min:6',
            'password_confirmation' => 'required|same:password|min:6',
        ], $messages);
        $user = User::query()->where('id',$id)->first();
        if ($validator->fails()) {
            $errors = $validator->errors();
            $input=$request->all();
            return response(["responseJSON" => $errors,"input"=>$input, "message" => 'يرجي التأكد من صحة البيانات وملئ جميع الحقول'], 422);
        }

        if ($validator->passes()) {

                $user->password = Hash::make($request->password);
                $user->save();

            return response()->json(['success'=>"تمت العملية بنجاح"]);


        }

    }
    public function address_delete($id)
    {
        $user_address =UserAddress::find($id);
        // return $user;

        $user_address->delete();
        $arr = array('msg' => 'هناك بعض الاخطاء حاول مرة اخرى', 'status' => false);
        if($user_address){
            $arr = array('msg' => "تم حذف العنوان", 'status' => true);
        }
        return Response()->json($arr);

    }
    public function address_delete_multi(Request $request)
    {
        $ids = $request->ids;
//        return $ids;
        UserAddress::query()->whereIn('id',explode(",",$ids))->delete();

        $arr = array('msg' => "تم حذف العنواين المحددة", 'status' => true);

        return Response()->json($arr);

    }
    public function delete_all(Request $request)
    {
        $ids = $request->ids;
//        return $ids;
       $users= User::query()->whereIn('id',explode(",",$ids))->get();
       foreach ($users as $user){
           UserAddress::query()->where('user_id',$user->id)->delete();
           $user->delete();
       }
        $arr = array('msg' => "تم حذف العملاء المحددة", 'status' => true);

        return Response()->json($arr);

    }
    public function delete($id)
    {
        $user =User::find($id);
        // return $user;
        UserAddress::query()->where('user_id',$id)->delete();
        $user->delete();
        $arr = array('msg' => 'هناك بعض الاخطاء حاول مرة اخرى', 'status' => false);
        if($user){
            $arr = array('msg' => "تم حذف المستخدم", 'status' => true);
        }
        return Response()->json($arr);

    }
    public function notification_send(Request $request, $user_id){
        $user_id =$request->user_id;
        $user=User::query()->where('id',$user_id)->first();
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'body' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response(["responseJSON" => $errors, "message" => 'هناك خطاء يرجى ملى جميع الحقول '], 422);
        }
        if ($validator->passes()){
            $fcm_token = $user->fcm_token;
            $title = $request->title;
            $body = $request->body;
            $this->send_notification($fcm_token,$title,$body);

            return response()->json(['success'=>"تمت عملية ارسال التنبيه بنجاح"]);
        }

    }
     public function orders($user_id){
        $orders=Order::query()->where('trader_id',Auth::id());
        return view('dashboard.users.orders.index',compact('orders','user_id'));


    }
    public function get_orders(Request $request,$user_id){

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
        $totalRecords = Order::query()->where(['trader_id'=>Auth::id(),'user_id'=>$user_id])->select('count(*) as allcount')->count();
        $totalRecordswithFilter = Order::query()->where(['trader_id'=>Auth::id(),'user_id'=>$user_id])->select('count(*) as allcount')
            ->where('order_no', 'like', '%' .$searchValue . '%')->count();

        // Fetch records
        $records = Order::query()->where(['trader_id'=>Auth::id(),'user_id'=>$user_id])->with(['user','order_address','payment','shipping'])->orderBy($columnName,$columnSortOrder)
            ->where('orders.order_no', 'like', '%' .$searchValue . '%')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();
        foreach($records as $record){


            $data_arr[] = array(
                "id" => $record->id,
                "order_no" => $record->order_no,
                "client_name" => $record->user->name,
                "country" => $record->order_address->country,
                "order_date" => $record->created_at->diffForHumans(),
                "payment" => $record->payment,
                "payment_type" => $record->payment_type,
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
}
