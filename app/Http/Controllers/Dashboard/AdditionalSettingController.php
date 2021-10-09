<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin\AdditionalSetting;
use App\Models\Admin\CountryStore;
use App\Models\Admin\Market;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdditionalSettingController extends Controller
{
    public function index(){
        $market=Market::query()->where('id',Auth::id())->with(['additional_setting','country'])->first();
        $country_store=CountryStore::query()->where(['trader_id'=>Auth::id(),'is_main'=>1])->with('country')->first();

        if ($market->additional_setting)
            $market->additional_setting->lang=json_decode($market->additional_setting->lang,true);
        $language=$market->additional_setting->lang;
        return view('dashboard.settings.additional_setting.index',compact('market','language','country_store'));
    }
    public function update(Request $request,$id){
        $user = Market::find($id);
        $validator = Validator::make($request->all(), [
            'owner_name' => 'required',
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
    public function additional_setting_store(Request $request,$id){
//        return $request->all();
        $setting=AdditionalSetting::query()->where('trader_id',Auth::id())->first();

        if (isset($request->show_copyrights) && isset($request->is_min_order_amount)){
            $setting->update([
                'show_copyrights'=>1,
                'is_min_order_amount'=>1,
                'min_order_amount'=>$request->min_order_amount,
            ]);
        }
        if (!isset($request->show_copyrights) && isset($request->is_min_order_amount)){
            $setting->update([
                'show_copyrights'=>0,
                'is_min_order_amount'=>1,
                'min_order_amount'=>$request->min_order_amount,
            ]);
        }
        if (isset($request->show_copyrights) && !isset($request->is_min_order_amount)){
            $setting->update([
                'show_copyrights'=>1,
                'is_min_order_amount'=>0,
            ]);
        }
        if (!isset($request->show_copyrights) && !isset($request->is_min_order_amount)){
            $setting->update([
                'show_copyrights'=>0,
                'is_min_order_amount'=>0,
            ]);
        }

        return response()->json([
            'message_ar'=>"تم تحديث خيارات المتجر الاضافية",
            'message_en'=>"Additional store options have been updated",

        ]);
    }
    public function language(Request $request,$id){
//        return $request->all();
        $setting=AdditionalSetting::query()->where('trader_id',Auth::id())->first();
        if (isset($request->support_english)){
            $setting->update([
                'lang'=>'["ar","en"]',
            ]);
        }
        else{
            $setting->update([
                'lang'=>'["ar"]',
            ]);
        }

        return response()->json([
            'message_ar'=>"تم تحديث لغات المتجر",
            'message_en'=>"Store languages have been updated",

        ]);
    }
    public function enable_maintenance_mode(Request $request){
        $setting=AdditionalSetting::query()->where('trader_id',Auth::id())->first();
        $setting->update([
            'is_active'=>1,
            'text_404'=>$request->message,
        ]);
        return response()->json([
            'message_ar'=>"تم تفعيل وضع الصيانة في متجرك",
            'message_en'=>"Maintenance mode has been activated for your store",

        ]);
    }
    public function update_deactivate_message(Request $request){
        $setting=AdditionalSetting::query()->where('trader_id',Auth::id())->first();
        $setting->update([
            'is_active'=>1,
            'text_404'=>$request->message,
        ]);
        return response()->json([
            'message_ar'=>"تم تحديث رسالة الصيانة بنجاح",
            'message_en'=>"Maintenance message has been successfully updated",

        ]);
    }
    public function enable_active_mode(Request $request){
        $setting=AdditionalSetting::query()->where('trader_id',Auth::id())->first();
        $setting->update([
            'is_active'=>0,
        ]);
        return response()->json([
            'message_ar'=>"تم إعادة تفعيل متجرك بنجاح",
            'message_en'=>"Your store has been reactivated successfully",

        ]);
    }
}
