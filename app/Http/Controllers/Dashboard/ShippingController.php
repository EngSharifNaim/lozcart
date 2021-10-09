<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin\City;
use App\Models\Admin\Country;
use App\Models\Admin\CountryStore;
use App\Models\Admin\Market;
use App\Models\Admin\ShippingChoice;
use App\Models\Admin\ShippingCity;
use App\Models\Admin\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ShippingController extends Controller
{
    public function index(){
        $countries=Country::all();
        $market=Market::query()->where('id',Auth::id())->with(['additional_setting'])->first();
        if ($market->additional_setting)
            $market->additional_setting->lang=json_decode($market->additional_setting->lang,true);
        $language=$market->additional_setting->lang;
        $country_store=CountryStore::query()->where(['trader_id'=>Auth::id(),'is_main'=>1])->with('country')->first();

        return view('dashboard.settings.shipping.index',compact('countries','language','country_store'));


    }
    public function get_shipping(Request $request){
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
        $totalRecords = ShippingChoice::query()->where(['trader_id'=>Auth::id()])
            ->select('count(*) as allcount')->count();
        $totalRecordswithFilter = ShippingChoice::query()
            ->select('count(*) as allcount')
            ->where(['trader_id'=>Auth::id(),['name', 'like', '%' .$searchValue . '%']])
            ->orWhere(['trader_id'=>Auth::id(),['name_ar', 'like', '%' .$searchValue . '%']])->count();

        // Fetch records
        $records = ShippingChoice::query()->with(['orders','country'])
            ->orderBy($columnName,$columnSortOrder)
            ->where(['trader_id'=>Auth::id(),['shipping_choices.name', 'like', '%' .$searchValue . '%']])
            ->orWhere(['trader_id'=>Auth::id(),['shipping_choices.name_ar', 'like', '%' .$searchValue . '%']])
//            ->select('name','file_no','address','mobile','age','id')
            ->skip($start)
            ->take($rowperpage)
            ->get();
//return $records;
        $data_arr = array();
        $country_store=CountryStore::query()->where(['trader_id'=>Auth::id(),'is_main'=>1])->with('country')->first();

        foreach($records as $record){
            $country=[];
            foreach (json_decode($record->country_id,true) as $item){
                $countries=Country::query()->where('id',$item)->first();
                if ($countries){
                    $country[]=$countries;
                }
            }

            $data_arr[] = array(
                "id" => $record->id,
                "name" => $record->name,
                "name_ar" => $record->name_ar,
                "delivery_time" => $record->delivery_time,
                "delivery_time_ar" => $record->delivery_time_ar,
                "price" => $record->price . ' '.(App::isLocale('en')?$country_store->country->currency_short:$country_store->country->currency_short_ar),
                "country" => $country,
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
    public function get_cities(Request $request)
    {
        if ($request->country_id == 'all'){
            $cities=[
                [
                    'id'=>'all',
                    'name'=>'All Cities',
                    'name_ar'=>'كل المدن'
                ]
            ];
        }else{
            $cities = City::query()->where('country_id',$request->country_id)->get();
        }

        return response()->json($cities);
    }
    public function store(Request $request)
    {
//        return json_encode($request->country_id);

        $validator = Validator::make($request->all(), [
            'name_ar' => 'required',
            // 'name' => 'required',
            'country_id' => 'required',
//            'city' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $input=$request->all();
            return response(["responseJSON" => $errors,"input"=>$input, "message" => 'يرجي التأكد من صحة البيانات وملئ جميع الحقول'], 422);
        }
        if ($validator->passes()) {
            $data=$request->all();
//            return $data;
//            if (in_array('all',$request->city)){
//                $city='all';
//                $data['city']=$city;
////                $data['country']=$city;
//            }
//            else{
//                $city='custom';
//                $data['city']=$city;
//                $data['city']=$city;
//            }
            $data['country_id']=json_encode($request->country_id);
            if (isset($request->paiement_when_receiving)){
                $paiement_when_receiving=1;
                $data['paiement_when_receiving']=$paiement_when_receiving;
            }else{
                $paiement_when_receiving=0;
                $data['paiement_when_receiving']=$paiement_when_receiving;
            }
            $data['trader_id']=Auth::id();
            $choice=ShippingChoice::query()->create($data);
//            if (! in_array('all',$request->city)){
//                foreach ($request->city as $item){
//                    ShippingCity::query()->create([
//                        'shipping_id'=>$choice->id,
//                        'city_id'=>$item,
//                    ]);
//                }
//            }
            return response()->json(['massage_ar'=>"تمت العملية بنجاح ",'massage_en'=>"The process has successfully"]);
            ;


        }

    }
    public function status(Request $request,$id){
        $choice=  ShippingChoice::find($id);
        $validator = Validator::make($request->all(), [
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response(["responseJSON" => $errors, "message" => 'هناك خطاء يرجى ملى جميع الحقول '], 422);
        }
        $data = $request->all();
        unset($data['_token']);

        $choice->update($data);

        if ($validator->passes()) {
            return response()->json(['massage_ar'=>"تم تحديث الحالة ",'massage_en'=>"Status has been updated"]);
        }

    }
    public function edit($id){
        $choice=ShippingChoice::query()->findOrFail($id);
        $choice->country_id=\GuzzleHttp\json_decode($choice->country_id,true);
        $countries=Country::all();
//        $choice_city=ShippingCity::query()->where(['shipping_id'=>$id])->pluck('city_id')->toArray();
//        return $choice;
        $market=Market::query()->where('id',Auth::id())->with(['additional_setting'])->first();
        if ($market->additional_setting)
            $market->additional_setting->lang=json_decode($market->additional_setting->lang,true);
        $language=$market->additional_setting->lang;
        return view('dashboard.settings.shipping.edit',compact('choice','countries','language'));

    }
    public function update(Request $request,$id)
    {
        $choice=ShippingChoice::query()->find($id);

        $validator = Validator::make($request->all(), [
            'name_ar' => 'required',
            'name' => 'required',
            'country_id' => 'required',
//            'city' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $input=$request->all();
            return response(["responseJSON" => $errors,"input"=>$input, "message" => 'يرجي التأكد من صحة البيانات وملئ جميع الحقول'], 422);
        }
        if ($validator->passes()) {
            $data=$request->all();
//            if (in_array('all',$request->city)){
//                $city='all';
//                $data['city']=$city;
////                $data['country']=$city;
//            }
//            else{
//                $city='custom';
//                $data['city']=$city;
//            }
            $data['country_id']=json_encode($request->country_id);
            if (isset($request->paiement_when_receiving)){
                $paiement_when_receiving=1;
                $data['paiement_when_receiving']=$paiement_when_receiving;
            }else{
                $paiement_when_receiving=0;
                $data['paiement_when_receiving']=$paiement_when_receiving;
            }
            $choice->update($data);
//                ShippingCity::query()->where('shipping_id',$id)->delete();
//            if (! in_array('all',$request->city)){
//                foreach ($request->city as $item){
//                    ShippingCity::query()->create([
//                        'shipping_id'=>$choice->id,
//                        'city_id'=>$item,
//                    ]);
//                }
//            }
            return response()->json(['massage_ar'=>"تمت العملية بنجاح ",'massage_en'=>"The process has successfully"]);



        }

    }
    public function delete_all(Request $request)
    {
        $ids = $request->ids;
//        return $ids;
        $choices= ShippingChoice::query()->whereIn('id',explode(",",$ids))->get();

        foreach ($choices as $choice){
            ShippingCity::query()->where('shipping_id',$choice->id)->delete();
            $choice->delete();
        }
        $arr = array('massage_ar' => "تم حذف الوسائل المحددة",'massage_en' => "Has been deleted", 'status' => true);

        return Response()->json($arr);

    }
    public function delete($id)
    {
        $choice =ShippingChoice::find($id);
        // return $user;
        ShippingCity::query()->where('shipping_id',$id)->delete();
        $choice->delete();
        $arr = array('msg' => 'هناك بعض الاخطاء حاول مرة اخرى', 'status' => false);
        if($choice){
            $arr = array('massage_ar' => "تم الحذف",'massage_en' => "Has been deleted", 'status' => true);

        }
        return Response()->json($arr);

    }
}
