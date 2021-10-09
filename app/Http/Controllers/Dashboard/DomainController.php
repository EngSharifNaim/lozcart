<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin\Domain;
use App\Models\Admin\Market;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DomainController extends Controller
{
    public function index($id=null){
        if ($id!=null){
            $market_now=Market::query()->where(['type'=>'Admin','trader_id'=>Auth::user()->trader_id ])
                ->first();
            $market=Market::query()->where('id',$market_now->id)->first();
            $notification= $market->notifications()->findOrFail($id);
            $notification->markAsRead();
        }
        $user_domain=Domain::query()->where(['trader_id'=>Auth::user()->trader_id])->first();

        return view('dashboard.settings.domain.index',compact('user_domain'));
    }
    public function connect(Request $request){
        $validator = Validator::make($request->all(), [


            'url' => 'required',

        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $input=$request->all();
            return response(["responseJSON" => $errors,"input"=>$input, "message" => __('Please make sure the data is correct, fill in all fields')], 422);
        }
        if ($validator->passes()) {
            $status=0;
//            if (isset($request->status)){
//                if ($request->status=2){
//                    $status=0;
//                }
//                if ($request->status=1){
//                    $status=0;
//                }
//
//            }
//            else{
//                $status=0;
//            }
            Domain::query()->updateOrCreate([
                'trader_id'=>Auth::id(),

            ],[
                'url'=>$request->url,
                'status'=>$status
            ]);
            return response()->json(['message'=> __('The process has successfully')]);

        }
    }
}
