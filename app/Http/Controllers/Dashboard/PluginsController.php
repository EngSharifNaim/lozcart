<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin\Plugin;
use App\Models\Admin\UserPlugin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PluginsController extends Controller
{
    public function index(){
        $plugins=Plugin::all();
        $user_plugins=UserPlugin::query()->where(['trader_id'=>Auth::id()])->pluck('plugin_id')->toArray();
        $user_plugin=UserPlugin::query()->where(['trader_id'=>Auth::id()])->get();
//        return $user_plugins;
        return view('dashboard.settings.plugins.index',compact('plugins','user_plugins','user_plugin'));
    }
    public function connect(Request $request){
        $validator = Validator::make($request->all(), [

            'plugin_id' => 'required',
            'script' => 'required',

        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $input=$request->all();
            return response(["responseJSON" => $errors,"input"=>$input, "message" => __('Please make sure the data is correct, fill in all fields')], 422);
        }
        if ($validator->passes()) {
            UserPlugin::query()->updateOrCreate([
                'plugin_id'=>$request->plugin_id,
                'trader_id'=>Auth::id(),
            ],[
                'script'=>$request->script,
            ]);
            return response()->json(['message'=> __('The process has successfully')]);

        }
    }
    public function getUserPlugin(Request $request){
        $plugin=UserPlugin::query()->where(['trader_id'=>Auth::id(),'plugin_id'=>$request->plugin_id])->first();

            return response()->json(['script'=> $plugin->script]);

    }
    public function status(Request $request,$id){
        $user_plugin=  UserPlugin::find($id);
        $validator = Validator::make($request->all(), [
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response(["responseJSON" => $errors, "message" =>  __('Please make sure the data is correct, fill in all fields')], 422);
        }
        $data = $request->all();
        unset($data['_token']);

        $user_plugin->update($data);

        if ($validator->passes()) {

            return response()->json(['message'=>__('The process has successfully')]);
        }

    }
}
