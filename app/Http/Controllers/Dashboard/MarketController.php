<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin\Market;
use App\Models\Admin\MarketSocial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MarketController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Active Markets|Suspended Markets',
            ['only' => ['index']]);
        $this->middleware('permission:Create Market',
            ['only' => ['create','store']]);
        $this->middleware('permission:Edit Market',
            ['only' => ['edit','update']]);
        $this->middleware('permission:Delete Market',
            ['only' => ['destroy']]);
        $this->middleware('permission:Suspended and Activate Markets',
            ['only' => ['status']]);

    }
    public function index($status){
        if (Auth::user()->can('Active Markets') && $status==1) {
            return view('dashboard.markets.index',compact('status'));
        }
        if (Auth::user()->can('Suspended Markets') && $status==0) {
            return view('dashboard.markets.index',compact('status'));
        }else{
            abort(403,'USER DOES NOT HAVE THE RIGHT PERMISSIONS.');
        }

    }
    public function profile($id){

    }
    public function get_markets(Request $request,$status){
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
        $totalRecords = Market::query()->where(['status'=>$status ])->select('count(*) as allcount')->count();
        $totalRecordswithFilter = Market::query()->where(['status'=>$status ])->select('count(*) as allcount')
            ->where('market_name', 'like', '%' .$searchValue . '%')->count();

        // Fetch records
        $records = Market::query()->where(['status'=>$status ])->orderBy($columnName,$columnSortOrder)
            ->where('traders.market_name', 'like', '%' .$searchValue . '%')
//            ->select('name','file_no','address','mobile','age','id')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();

        foreach($records as $record){


            $data_arr[] = array(
                "id" => $record->id,
                "owner_name" => $record->owner_name,
                "market_name" => $record->market_name,
                "market_name_ar" => $record->market_name_ar,
                "logo" => $record->logo,
                "mobile" => $record->mobile,
                "email" => $record->email,
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
    public function edit($status,$id){
        Market::query()->findOrFail($id);
        $user=Market::query()->where('id',$id)->with('additional_setting')->first();
        if ($user->additional_setting)
        $user->additional_setting->lang=json_decode($user->additional_setting->lang,true);
//        return $user;
        $user_social=MarketSocial::query()->where('trader_id',$id)->first();

        return view('dashboard.markets.edit',compact('status','user','user_social'));

    }
    public function status(Request $request,$id){
        $user=  Market::find($id);
        $validator = Validator::make($request->all(), [
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response(["responseJSON" => $errors, "message" => 'هناك خطاء يرجى ملى جميع الحقول '], 422);
        }
        $data = $request->all();
        unset($data['_token']);

        $user=  Market::query()->where('id', $id)
            ->update($data);

        if ($validator->passes()) {
            return response()->json(['success'=>"تم تحديث حالة المستخدم"]);
        }

    }
    public function update(Request $request,$id){
        $user = Market::find($id);
        $validator = Validator::make($request->all(), [
//            'en_name' => 'required',
            'name' => 'required',
//            'user_name' => 'required|unique:users,user_name,'.$id,
            'mobile' => 'required|unique:traders,mobile,'.$id,
            'email' => 'required|unique:traders,email,'.$id,
//            'type' => 'required'
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            $input=$request->all();
            return response(["responseJSON" => $errors,"input"=>$input, "message" => 'يرجي التأكد من صحة البيانات وملئ جميع الحقول'], 422);
        }
        $data = $request->all();
        unset($data['_token']);
//        return $data;
        if ($validator->passes()) {
            Market::query()->where('id',$id)->update($data);
            return response()->json(['success'=>"تمت العملية بنجاح"]);
        }
    }
    public function update_social(Request $request,$id){
        $user = Market::find($id);
        $validator = Validator::make($request->all(), [
            'instagram'=>'url',
            'snapchat'=>'url',
            'twitter'=>'url',
            'whatsapp'=>'url',
            'm3roof'=>'url',
            'phone'=>'int',
            'facebook'=>'url',
            'googlePlay'=>'url',
            'appStore'=>'url',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            $input=$request->all();
            return response(["responseJSON" => $errors,"input"=>$input, "message" => 'يرجي التأكد من صحة البيانات وملئ جميع الحقول'], 422);
        }
        $data = $request->all();
        unset($data['_token']);
//        return $data;
//        [
//            'instagram'=>$request->instagram,
//            'snapchat'=>$request->snapchat,
//            'twitter'=>$request->twitter,
//            'whatsapp'=>$request->whatsapp,
//            'm3roof'=>$request->m3roof,
//            'phone'=>$request->phone,
//            'facebook'=>$request->facebook,
//            'googlePlay'=>$request->googlePlay,
//            'appStore'=>$request->appStore,
//        ]
        if ($validator->passes()) {

            MarketSocial::query()->updateOrCreate (['trader_id'=>$id],$data);
            return response()->json(['success'=>"تمت العملية بنجاح"]);
        }
    }
    public function delete($id)
    {
        $user =Market::find($id);
        // return $user;

        $user->delete();
        $arr = array('msg' => 'هناك بعض الاخطاء حاول مرة اخرى', 'status' => false);
        if($user){
            $arr = array('msg' => "تم حذف المستخدم", 'status' => true);
        }
        return Response()->json($arr);

    }
}
