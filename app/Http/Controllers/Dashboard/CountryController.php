<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin\Country;
use App\Models\Admin\CountryStore;
use App\Models\Admin\Market;
use App\Models\Admin\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CountryController extends Controller
{
    public function index(){
        $countries=Country::all();
        $countries_store=CountryStore::query()->where('trader_id',Auth::id())->with('country')->get();
//        return $countries_store;
        return view('dashboard.settings.countries.index',compact('countries',
          'countries_store'  ));
    }
    public function store(Request $request){
//        return $request->all();
        $validator = Validator::make($request->all(), [

            'country_id' => 'required',

        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $input=$request->all();
            return response(["responseJSON" => $errors,"input"=>$input, "message" => 'يرجي التأكد من صحة البيانات وملئ جميع الحقول'], 422);
        }
        if ($validator->passes()) {
            $main=CountryStore::query()->where(['trader_id'=>Auth::id(),'is_main'=>1])->first();
            if ($main){
                CountryStore::query()->updateOrCreate([
                    'trader_id'=>Auth::id(),
                    'country_id'=>$request->country_id],[
//                        'is_main'=>0,
                        'status'=>1,
                ]);
            }else{
                CountryStore::query()->updateOrCreate([
                    'trader_id'=>Auth::id(),
                    'country_id'=>$request->country_id],[
                    'is_main'=>1,
                    'status'=>1,
                ]);
            }
            return response()->json(['massage_ar'=>"تمت العملية بنجاح ",'massage_en'=>"The process has successfully"]);

        }
    }
    public function delete($id)
    {
        $country_store =CountryStore::find($id);
        $country_store->delete();
        $arr = array('msg' => 'هناك بعض الاخطاء حاول مرة اخرى', 'status' => false);
        if($country_store){
            $arr = array('massage_ar' => "تم الحذف",'massage_en' => "Has been deleted", 'status' => true);

        }
        return Response()->json($arr);

    }
    public function status(Request $request,$id){
        $country_store=  CountryStore::find($id);
//        return $country_store;
        $validator = Validator::make($request->all(), [
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response(["responseJSON" => $errors, "message" => 'هناك خطاء يرجى ملى جميع الحقول '], 422);
        }
        $data = $request->all();
        unset($data['_token']);
        if ($request->status==1){
            $data['status']=0;
        }
        if ($request->status==0){
            $data['status']=1;
        }

        $country_store->update($data);

        if ($validator->passes()) {
            return response()->json(['massage_ar'=>"تم تحديث الحالة ",'massage_en'=>"Status has been updated"]);
        }

    }
    public function set_main(Request $request,$id){
        $country_store=  CountryStore::query()->where('id',$id)->with('country')->first();
//        return $country_store;
        $validator = Validator::make($request->all(), [
//            'status' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response(["responseJSON" => $errors, "message" => 'هناك خطاء يرجى ملى جميع الحقول '], 422);
        }


        if ($validator->passes()) {
            $main=CountryStore::query()->where(['trader_id'=>Auth::id(),'is_main'=>1])->with('country')->first();
            $products = Product::query()->where(['trader_id'=>Auth::id()])->get();
            if ($main){
                $main->update(['is_main'=>0]);
                $country_store->update(['is_main'=>1]);
            }
            foreach ($products as $product){

                $price=$product->price;
                $cost_price=$product->cost_price;
                $sale=$product->sale;
                $current_currency=$main->country->currency_short;
                $new_currency=$country_store->country->currency_short;
//                $price&to=$new_currency&from=$current_currency


                $price = ($price)?($price):(1);
                $cost_price = ($cost_price)?($cost_price):(1);
                $sale = ($sale)?($sale):(1);

            $apikey = 'd1ded944220ca6b0c442';

            $from_Currency = urlencode($current_currency);
            $to_Currency = urlencode($new_currency);
            $query =  "{$current_currency}_{$new_currency}";

            // change to the free URL if you're using the free version
            $json = file_get_contents("http://free.currencyconverterapi.com/api/v5/convert?q={$query}&compact=y&apiKey={$apikey}");

            $obj = json_decode($json, true);

            $val = $obj["$query"];

            $total = $val['val'] * 1;

            $formatValue = number_format($total, 2, '.', '');

                $price = $price * $formatValue;
                $cost_price = $cost_price * $formatValue;
                $sale = $sale * $formatValue;
                $product->update([
                    'price'=>$price,
                    'cost_price'=>$cost_price,
                    'sale'=>$sale,
                ]);
            }
            return response()->json(['massage_ar'=>"تم تحديث الحالة ",'massage_en'=>"Status has been updated"]);
        }

    }
}
