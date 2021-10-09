<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin\Country;
use App\Models\Admin\Market;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index(){
        $countries=Country::all();
        $user=Market::query()->findOrFail(Auth::id());
        return view('dashboard.profile.index',compact('countries','user'));
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
    public function update_password(Request $request,$id)
    {
        $messages = [
            'old_password.required' => 'الرجاء ادخال كلمة المرور الحالية',
            'password_confirmation.required' => 'الرجاء تاكيد كلمة المرور الجديدة',
            'password_confirmation.same' => 'كلمة المرور غير متطابقة',
            'password.required' => 'الرجاء ادخال كلمة المرورالجديدة',
        ];

        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required|same:password|min:6',
            'password_confirmation' => 'required|same:password|min:6',
        ], $messages);
        $user = Market::query()->where('id',$id)->first();
        if ($validator->fails()) {
            $errors = $validator->errors();
            $input=$request->all();
            return response(["responseJSON" => $errors,"input"=>$input, "message" => 'يرجي التأكد من صحة البيانات وملئ جميع الحقول'], 422);
        }

        if ($validator->passes()) {

            $current_password = $user->password;
            if(Hash::check($request->old_password, $current_password))
            {
                $user->password = Hash::make($request->password);
                $user->save();
            }
            else
            {
                $errors =['old_password'=>[
                    'ادخل كلمة المرور الحالية الصحيحة'
                ]];
                $input=$request->all();

                return response(["responseJSON" => $errors, "input"=>$input,"message" => 'ادخل كلمة المرور الحالية الصحيحة'], 422);
            }
            return response()->json(['success'=>"تمت العملية بنجاح"]);




        }

    }
}
