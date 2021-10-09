<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin\Permissions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function get_roles(Request $request){

        ## Read value
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
        $totalRecords = Role::query()->where('market_id',Auth::id())->select('count(*) as allcount')->count();
        $totalRecordswithFilter = Role::query()->select('count(*) as allcount')->where([['name', 'like', '%' .$searchValue . '%'],'market_id'=>Auth::id()])->count();

        // Fetch records
        $records = Role::query()->orderBy($columnName,$columnSortOrder)
            ->where([['roles.name', 'like', '%' .$searchValue . '%'],'market_id'=>Auth::id()])
//            ->select('name','file_no','address','mobile','age','id')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();

        foreach($records as $record){


            $data_arr[] = array(
                "id" => $record->id,
                "name" => $record->name,

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
    public function index()
    {
//        $roles = Role::all();
        return view('dashboard.roles.index');
    }

    public function create()
    {
        $permissions = Permissions::where('parent', 0)->with('children')->get();
//        return $permissions;
        return view('dashboard.roles.add', compact('permissions'));
    }

    public function store(Request $request)
    {
//        return $request->all();
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles,name',
            'ar_name' => 'required|unique:roles,ar_name',
//            'permission' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();

            $input = $request->all();

            return response(
                ["responseJSON" => $errors,
                    "input" => $input, "message" => 'تاكد من صحة البيانات وملئ جميع الحقول'], 422);
        }
        DB::beginTransaction();
        try {
            $role = Role::create([
                'name' => $request->name,
                'ar_name' => $request->ar_name,
            ]);
//            return $role;
            $role->syncPermissions($request->permission);
            DB::commit();
            return response()->json(['success' => "تمت عمليةالتخزين"]);
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();
        return view('roles.show',compact('role','rolePermissions'));
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permissions::where('parent', 0)->with('children')->get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
//        return $rolePermissions;
        return view('dashboard.roles.edit',compact('role','permissions','rolePermissions'));
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles,name,'. $request->role_id,
            'ar_name' => 'required|unique:roles,ar_name,'. $request->role_id,
//            'permission' => 'required',
            'role_id' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();

            $input = $request->all();

            return response(
                ["responseJSON" => $errors,
                    "input" => $input, "message" => 'تاكد من صحة البيانات وملئ جميع الحقول'], 422);
        }
        DB::beginTransaction();
        try {
            $role = Role::find($request->role_id);
            $role->name = $request->name;
            $role->ar_name = $request->ar_name;
            $role->save();
            $role->syncPermissions($request->permission);
            DB::commit();
            return response()->json(['success' => "تمت عمليةالتحديث بنجاح"]);
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
    public function destroy($id)
    {
        $role=Role::where('id',$id)->delete();
        $arr = array('msg' => 'هناك بعض الاخطاء حاول مرة اخرى', 'status' => false);
        if($role){
            $arr = array('msg' => "تم حذف الصلاحية", 'status' => true);
        }
        return Response()->json($arr);
    }
}
