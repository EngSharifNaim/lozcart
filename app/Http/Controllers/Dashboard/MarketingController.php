<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin\Market;
use App\Models\Admin\Navbar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MarketingController extends Controller
{
    public function navbar(){
        $navbar=Navbar::query()->where('market_id',Auth::id())->first();
        $market=Market::query()->where('id',Auth::id())->with(['additional_setting','country','trader_plan'])->first();
        if ($market->additional_setting)
            $market->additional_setting->lang=json_decode($market->additional_setting->lang,true);
        $language=$market->additional_setting->lang;
        return view('dashboard.marketing.index',compact('navbar','language'));
    }
    public function navbar_update(Request $request){
//        return $request->all();
//        $user = User::find($id);
        $validator = Validator::make($request->all(), [
            'color' => 'required',
            'text' => 'required',
//            'link' => 'required'
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            $input=$request->all();
            return response(["responseJSON" => $errors,"input"=>$input, "message" => 'يرجي التأكد من صحة البيانات وملئ جميع الحقول'], 422);
        }

        if ($validator->passes()) {
            if (isset($request->status)){
                $status=1;
            }else{
                $status=0;
            }
            Navbar::query()->updateOrCreate([
                'market_id'=>Auth::id(),
            ],[
                'color'=>$request->color,
                'text'=>$request->text,
                'text_en'=>$request->text_en,
                'link'=>$request->link,
                'status'=>$status,

            ]);
            return response()->json(['success'=>__('The process has successfully')]);
        }
    }

}
