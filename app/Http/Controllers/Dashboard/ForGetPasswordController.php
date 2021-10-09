<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Mail\ResetPassword;
use App\Models\Admin\Market;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ForGetPasswordController extends Controller
{
    public function StoreforgotPassword(Request $request){
//        return $request->all();
        $validator = Validator::make($request->all(), [
            'email' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            $input=$request->all();
            return response()->json(["responseJSON" => $errors,"input"=>$input, "message" => __('Please make sure the data is correct, fill in all fields')], 422);
        }
        if ($validator->passes()) {
            $market=Market::query()->where('email',$request->email)->first();
            if ($market){
                $code =mt_rand(2000,9000000000);
                DB::table('password_resets')->insert(
                    ['email' => $request->email, 'token' => $code,'type'=>1, 'created_at' => Carbon::now()]
                );
//                return $code;
                $email=$market->email;
                Mail::to($email)->send(new ResetPassword($market,$code));
                return response()->json(['status'=>1,'message'=> __('The process has successfully')]);

            }else{
                return response()->json(['status'=>0,'message'=> __('The selected email is invalid.')]);

            }

        }
    }
    public function reset(Request $request){
//        return $request->all();
        $messages = [
            'password_confirmation.required' => 'الرجاء تاكيد كلمة المرور الجديدة',
            'password_confirmation.same' => 'كلمة المرور غير متطابقة',
        ];

        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'email' => 'required',
            'password' => 'required|same:password|min:9',
            'password_confirmation' => 'required|same:password|min:9',
        ], $messages);
        if ($validator->fails()) {
            $errors = $validator->errors();
            $input=$request->all();
            return response()->json(["responseJSON" => $errors,"input"=>$input, "message" => __('Please make sure the data is correct, fill in all fields')], 422);
        }
        if ($validator->passes()) {
            $market=Market::query()->where('email',$request->email)->first();
            if ($market){
//                $code =mt_rand(2000,9000000000);
                $code=   DB::table('password_resets')
                    ->where(['email' => $request->email, 'token' => $request->code,'type'=>1])
                    ->first();
                if ($code){
                    $market
                        ->update(['password' => Hash::make($request->password)]);
                    DB::table('password_resets')->where(['email'=> $request->email])->delete();
                    return response()->json(['status'=>1,'message'=> __('The process has successfully')]);

                }else{
                    return response()->json(['status'=>0,'message'=> __('Incorrect password set code')]);


                }


            }else{
                return response()->json(['status'=>0,'message'=> __('The selected email is invalid.')]);

            }

        }
    }
}
