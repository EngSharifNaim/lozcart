<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin\PartnerService;
use App\Models\Admin\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PartnerServicesController extends Controller
{
    public function index(){
        $services=Service::all();
        return view('dashboard.partner_services.index',compact('services'));
    }
    public function order(Request $request){
        $validator = Validator::make($request->all(), [

            'service_id' => 'required',
            'details' => 'required',

        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $input=$request->all();
            return response(["responseJSON" => $errors,"input"=>$input, "message" => __('Please make sure the data is correct, fill in all fields')], 422);
        }
        if ($validator->passes()) {
            PartnerService::query()->create([
                'service_id'=>$request->service_id,
                'details'=>$request->details,
                'trader_id'=>Auth::id(),
            ]);
            return response()->json(['message'=> __('The process has successfully')]);

        }
    }
}
