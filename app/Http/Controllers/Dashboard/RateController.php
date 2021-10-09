<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RateController extends Controller
{
    public function index(){
        $rates=Rate::query()->where('trader_id',Auth::id())->with(['user','product'])->paginate(2);
        return view('dashboard.settings.rates.index',compact('rates'));
    }
    public function filter (Request $request){
        $rates=Rate::query()->where(['trader_id'=>Auth::id(),'type'=>$request->filter])->with(['user','product'])->paginate(2);
//        return $request->all();
        return view('dashboard.settings.rates.index',compact('rates'));
    }
    public function get_more_rate (Request $request){
        $rates=Rate::query()->where('trader_id',Auth::id())->with(['user','product'])->paginate(2);
        return view('dashboard.ajaxData.rating',compact('rates'))->render();
    }
//    public function filter (Request $request){
//        $rates=Rate::query()->where(['trader_id'=>Auth::id(),'type'=>$request->type])->with(['user','product'])->paginate(2);
//        return view('dashboard.ajaxData.rating',compact('rates'))->render();
//    }
    public function activate(Request $request,$id){
        $rate=Rate::query()->find($id);
        $rate->update(['status'=>1]);
            return response()->json([
                'message_ar'=>"تم تحديث الحالة",
                'message_en'=>"Status has been updated",
                'status_ar'=>"فعال",
                'status_en'=>"Active",
            ]);


    }
    public function deactivate(Request $request,$id){
        $rate=Rate::query()->find($id);
        $rate->update(['status'=>0]);
            return response()->json([
                'message_ar'=>"تم تحديث الحالة",
                'message_en'=>"Status has been updated",
                'status_ar'=>"فعال غير",
                'status_en'=>"Not Active",
            ]);


    }
    public function delete($id)
    {
        $rate =Rate::find($id);

        $rate->delete();

        if($rate){
            return response()->json([
                'message_ar'=>"تم الحذف",
                'message_en'=>"Deleted",

            ]);
        }else{
            $arr = array('msg' => 'هناك بعض الاخطاء حاول مرة اخرى', 'status' => false);
            return Response()->json($arr);
        }
//

    }
}
