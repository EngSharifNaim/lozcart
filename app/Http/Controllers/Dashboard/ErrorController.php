<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin\Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class ErrorController extends Controller
{
    public function store(Request $request){
//        return $request->url;
        $validator = Validator::make($request->all(), [

            'errorCode' => 'required',
            'url' => 'required',
            'message' => 'required',

        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $input=$request->all();
            return response(["responseJSON" => $errors,"input"=>$input, "message" => __('Please make sure the data is correct, fill in all fields')], 422);
        }
        if ($validator->passes()) {
            Error::query()->create([
                'errorCode'=>$request->errorCode,
                'url'=>$request->url,
                'message'=>$request->message,
            ]);
//            return redirect()->back();
            return response()->json(['message'=> __('The process has successfully')]);

        }
    }
}
