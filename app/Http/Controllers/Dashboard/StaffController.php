<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Mail\NewStaff;
use App\Models\Admin\Country;
use App\Models\Admin\Market;
use App\Models\Admin\Permissions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class StaffController extends Controller
{
    public function index(){
        $countries=Country::all();
        return view('dashboard.settings.staff.index',compact('countries'));


    }
    public function get_staff(Request $request){
        ## Read value
//        return $status;
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        // Total records
        $totalRecords = Market::query()->where(['trader_id'=>Auth::id()])
//            ->orWhere('trader_id',Auth::user()->trader_id)
            ->select('count(*) as allcount')->count();
        $totalRecordswithFilter = Market::query()->where(['trader_id'=>Auth::id()])
//            ->orWhere('trader_id',Auth::user()->trader_id)
            ->select('count(*) as allcount')
            ->where('owner_name', 'like', '%' .$searchValue . '%')->count();

        // Fetch records
        $records = Market::query()->where(['trader_id'=>Auth::id()])
//            ->orWhere('trader_id',Auth::user()->trader_id)
            ->orderBy($columnName,$columnSortOrder)
            ->where('traders.owner_name', 'like', '%' .$searchValue . '%')
//            ->select('name','file_no','address','mobile','age','id')
            ->skip($start)
            ->take($rowperpage)
            ->get();
//return $records;
        $data_arr = array();

        foreach($records as $record){


            $data_arr[] = array(
                "id" => $record->id,
                "name" => $record->owner_name,
                "mobile" => $record->mobile,
                "email" => $record->email,
                "type" => $record->type,
                "status" => $record->status,

            );
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );

        echo json_encode($response);
        exit;
    }
    public function create(){
        $roles = Role::query()->where('market_id',Auth::id())->whereNotIn('name',['Admin'])->get();
//        return $roles;
        $permissions = Permissions::where(['parent'=> 0,'type'=>'Market'])->with('children')->get();
        return view('dashboard.settings.staff.add', compact(  'roles','permissions'));

    }
    public function get_permission(Request $request){
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$request->id)

            ->get();
        return response()->json(['role_has_permissions'=>$rolePermissions]);
    }
    public function store(Request $request){
//        return $request->all();
//        return array_merge($request->basicPermissions,$request->permissions);
        $validator = Validator::make($request->all(), [
//            'en_name' => 'required',
            'name' => 'required',
            'password' => 'required',
            'role_id' => 'required',
//            'mobile' => 'required|unique:traders',
            'email' => 'required|unique:traders',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            $input=$request->all();
            return response(["responseJSON" => $errors,"input"=>$input, "message" => 'يرجي التأكد من صحة البيانات وملئ جميع الحقول'], 422);
        }

        if ($validator->passes()) {
            DB::beginTransaction();
            try {
            $user = Market::query()->create([
                'owner_name'=>$request->name,
                'email'=>$request->email,
                'type'=>'Staff',
                'plan_id'=>Auth::user()->plan_id,
                'trader_id'=>Auth::id(),
                'password'=>bcrypt($request->password),
            ]);
//            return $user;
            if (isset($request->permissions_name)){
                $role = Role::create([
                    'name' => $request->permissions_name,
                    'ar_name' => $request->permissions_name_ar,
                    'market_id'=>Auth::id(),
                    'guard_name'=>'web',
                ]);
//            return $role;
                $role->syncPermissions($request->permission);
                $user->assignRole($request->input($role->id));
            }else{
                $user->assignRole($request->input('role_id'));
                $role = Role::find($request->role_id);
                if (isset($request->basicPermissions)&&isset($request->permissions)){
                    $permission=array_merge($request->basicPermissions,$request->permissions);
                }else{
                    $permission=array_merge($request->basicPermissions);
                }

                $role->syncPermissions($permission);
                }
            $user['new_password']=$request->password;
                Mail::to($user->email)->send(new NewStaff($user));

                DB::commit();
            }
            catch (Throwable $e) {
                DB::rollBack();
                throw $e;
            };
            return response()->json([
                'message_ar'=>"تمت العملية بنجاح",
                'message_en'=>"operation accomplished successfully",

            ]);
        }
    }
    public function edit($id)
    {
        $market = Market::find($id);
//        return $market;
        $permissions = Permissions::where(['parent'=> 0,'type'=>'Market'])->with('children')->get();
        $roles = Role::query()->where('market_id',Auth::id())->whereNotIn('name',['Admin'])->get();
        $userRole = $market->roles->pluck('id','id')->first();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$userRole)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
//        return $rolePermissions;
        return view('dashboard.settings.staff.edit',compact(
            'market',
            'permissions',
            'rolePermissions',
            'userRole'
        ,'roles'));
    }
    public function update(Request $request,$id){
//        return $request->all();
        $market=Market::query()->find($id);
//        return array_merge($request->basicPermissions,$request->permissions);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'role_id' => 'required',
            'email' => 'required|unique:traders,email,'.$id,
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            $input=$request->all();
            return response(["responseJSON" => $errors,"input"=>$input, "message" => 'يرجي التأكد من صحة البيانات وملئ جميع الحقول'], 422);
        }

        if ($validator->passes()) {
            DB::beginTransaction();
            try {
                $market ->update([
                    'owner_name'=>$request->name,
                    'email'=>$request->email,
                ]);
//            return $user;
                if (isset($request->permissions_name)){
                    $role = Role::create([
                        'name' => $request->permissions_name,
                        'ar_name' => $request->permissions_name_ar,
                        'market_id'=>Auth::id(),
                        'guard_name'=>'web',
                    ]);
//            return $role;
                    $role->syncPermissions($request->permission);
                    DB::table('model_has_roles')->where('model_id',$id)->delete();
                    $market->assignRole($request->input($role->id));
                }else{
                    DB::table('model_has_roles')->where('model_id',$id)->delete();
                    $market->assignRole($request->input('role_id'));
                    $role = Role::find($request->role_id);
                    if (isset($request->basicPermissions)&&isset($request->permissions)){
                        $permission=array_merge($request->basicPermissions,$request->permissions);
                    }else{
                        $permission=array_merge($request->basicPermissions);
                    }
                    $role->syncPermissions($permission);
                }
                DB::commit();
            }
            catch (Throwable $e) {
                DB::rollBack();
                throw $e;
            };
            return response()->json([
                'message_ar'=>"تمت العملية بنجاح",
                'message_en'=>"operation accomplished successfully",

            ]);
        }
    }
    public function status(Request $request,$id){
        $market=  Market::find($id);
        $validator = Validator::make($request->all(), [
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response(["responseJSON" => $errors, "message" => 'هناك خطاء يرجى ملى جميع الحقول '], 422);
        }
        $data = $request->all();
        unset($data['_token']);



        if ($validator->passes()) {
            $market ->update($data);
            return response()->json([
                'message_ar'=>"تم تحديث حالة المستخدم",
                'message_en'=>"Staff Status have been updated",

            ]);
        }

    }
    public function update_password(Request $request,$id)
    {
        $messages = [
            'password_confirmation.same' => 'كلمة المرور غير متطابقة',
            'password.required' => 'الرجاء ادخال كلمة المرور',
            'password_confirmation.required' => 'الرجاء تاكيد كلمة المرور الجديدة',
        ];

        $validator = Validator::make($request->all(), [
            'password' => 'required|same:password|min:6',
            'password_confirmation' => 'required|same:password|min:6',
        ], $messages);
        $market = Market::query()->where('id',$id)->first();
        if ($validator->fails()) {
            $errors = $validator->errors();
            $input=$request->all();
            return response(["responseJSON" => $errors,"input"=>$input, "message" => 'يرجي التأكد من صحة البيانات وملئ جميع الحقول'], 422);
        }

        if ($validator->passes()) {

            $market->password = Hash::make($request->password);
            $market->save();

            return response()->json([
                'message_ar'=>"تمت العملية بنجاح",
                'message_en'=>"operation accomplished successfully",

            ]);


        }

    }
    public function delete_all(Request $request)
    {
        $ids = $request->ids;
//        return $ids;
        $markets= Market::query()->whereIn('id',explode(",",$ids))->get();
        foreach ($markets as $market){
            DB::table('model_has_roles')->where('model_id',$market->id)->delete();
            $market->delete();
        }
        $arr = array(
            'message_ar'=>"تمت العملية بنجاح",
            'message_en'=>"operation accomplished successfully",
            'status' => true
        );

        return Response()->json($arr);

    }
    public function delete($id)
    {
        $market =Market::find($id);
        // return $user;
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $market->delete();
        $arr = array('message_ar'=>"هناك بعض الاخطاء حاول مرة اخرى",
            'message_en'=>"There are some errors, try again",
            'status' => false);
        if($market){
            $arr = array(
                'message_ar'=>"تمت العملية بنجاح",
                'message_en'=>"operation accomplished successfully",
                'status' => true
            );
        }
        return Response()->json($arr);

    }
}
