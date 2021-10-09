<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin\Country;
use App\Models\Admin\Market;
use App\Models\Admin\MarketSocial;
use App\Models\Admin\Tax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function index(){
        $tax=Tax::query()->where('trader_id',Auth::id())->first();
        return view('dashboard.settings.index',compact('tax'));
    }
    public function setting_store(){
//        $market=Market::query()->where('id',Auth::id())->first();
        $countries=Country::all();
        $market=Market::query()->where('id',Auth::id())->with(['additional_setting','country','links'])->first();
        if ($market->additional_setting)
            $market->additional_setting->lang=json_decode($market->additional_setting->lang,true);
        $language=$market->additional_setting->lang;
        return view('dashboard.settings.store',compact('market','language','countries'));
    }
    public function updateLogo(Request $request){
//        return $request->all();
        $market=Market::query()->find(Auth::id());
        DB::beginTransaction();
        try {
            if ($request->hasfile('image') ) {
                $image = $request->file('image');
                $image_name = time().'.' .$image->getClientOriginalExtension();
                $image->move(public_path('uploads/logoMarket/'), $image_name);
//                $oldImage=public_path('uploads/logoMarket/'). $market->logo;
//                if ($oldImage){
//                    unlink($oldImage);
//                }
                $market->update([
                    'logo'=>$image_name
                ]);


            }
            DB::commit();
        }catch (\Throwable $e){
            DB::rollBack();
            throw $e;
        }


        return response()->json([
            'message_ar'=>'تم تحديث الشعار',
            'message_en'=>'Logo has been updated',
            'status'=>1,
            ]);
    }
    public function save_location(Request $request){
//        return $request->all();
        $market=Market::query()->find(Auth::id());
        DB::beginTransaction();
        try {

                $market->update($request->all());

            DB::commit();
        }catch (\Throwable $e){
            DB::rollBack();
            throw $e;
        }


        return response()->json([
            'message_ar'=>'تم تحديث الموقع',
            'message_en'=>'Location has been updated',
            'status'=>1,
            ]);
    }
    public function save_description(Request $request){
//        return $request->all();
        $market=Market::query()->find(Auth::id());
        DB::beginTransaction();
        try {

                $market->update($request->all());

            DB::commit();
        }catch (\Throwable $e){
            DB::rollBack();
            throw $e;
        }


        return response()->json([
            'message_ar'=>'تم تحديث الوصف',
            'message_en'=>'Description has been updated',
            'status'=>1,
            ]);
    }
    public function edit_store(Request $request){
//        return $request->all();
        $market=Market::query()->find(Auth::id());
        DB::beginTransaction();
        try {

                $market->update($request->all());

            DB::commit();
        }catch (\Throwable $e){
            DB::rollBack();
            throw $e;
        }


        return response()->json([
            'message_ar'=>'تم تحديث البيانات',
            'message_en'=>'Data has been updated',
            'status'=>1,
            ]);
    }
    public function save_link(Request $request){
//        return $request->all();
        $market=MarketSocial::query()->where('trader_id',Auth::id())->first();
        DB::beginTransaction();
        try {

            MarketSocial::query()->updateOrCreate(['trader_id'=>Auth::id()],$request->all());

            DB::commit();
        }catch (\Throwable $e){
            DB::rollBack();
            throw $e;
        }


        return response()->json([
            'message_ar'=>'تم تحديث الينكات',
            'message_en'=>'Links has been updated',
            'status'=>1,
            ]);
    }
    public function save_update_tax(Request $request){
//        return $request->all();
        $validator = Validator::make($request->all(), [
//            'description_ar' => 'required',
//            'title_ar' => 'required',

        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $input=$request->all();
            return response(["responseJSON" => $errors,"input"=>$input, "message" => 'يرجي التأكد من صحة البيانات وملئ جميع الحقول'], 422);
        }
        if ($validator->passes()) {
            if (isset($request->have_tax) && isset($request->is_tax_paid_by_merchant)){
                $have_tax=1;
                $is_tax_paid_by_merchant=1;
                Tax::query()->updateOrCreate([
                    'trader_id' => Auth::id(),
                ],[
                    'have_tax'=>$have_tax,
                    'is_tax_paid_by_merchant'=>$is_tax_paid_by_merchant,
                    'tax_name'=>$request->tax_name,
                    'tax_number'=>$request->tax_number,
                    'tax_percentage'=>$request->tax_percentage,
                ]);
            }
            if (!isset($request->have_tax) && isset($request->is_tax_paid_by_merchant)){
                $have_tax=0;
                $is_tax_paid_by_merchant=1;
                Tax::query()->updateOrCreate([
                    'trader_id' => Auth::id(),
                ],[
                    'have_tax'=>$have_tax,
                    'is_tax_paid_by_merchant'=>$is_tax_paid_by_merchant,
                ]);
            }
            if (isset($request->have_tax) && !isset($request->is_tax_paid_by_merchant)){
                $have_tax=1;
                $is_tax_paid_by_merchant=0;
                Tax::query()->updateOrCreate([
                    'trader_id' => Auth::id(),
                ],[
                    'have_tax'=>$have_tax,
                    'is_tax_paid_by_merchant'=>$is_tax_paid_by_merchant,
                    'tax_name'=>$request->tax_name,
                    'tax_number'=>$request->tax_number,
                    'tax_percentage'=>$request->tax_percentage,
                ]);
            }
            if (!isset($request->have_tax) && !isset($request->is_tax_paid_by_merchant)){
                $have_tax=0;
                $is_tax_paid_by_merchant=0;
                Tax::query()->updateOrCreate([
                    'trader_id' => Auth::id(),
                ],[
                    'have_tax'=>$have_tax,
                    'is_tax_paid_by_merchant'=>$is_tax_paid_by_merchant,
                ]);
            }

            $arr = array(
                'message_ar'=>"تمت العملية بنجاح",
                'message_en'=>"operation accomplished successfully",
                'status' => true
            );
            return Response()->json($arr);
        }
    }
}
