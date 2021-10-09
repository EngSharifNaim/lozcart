<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin\Market;
use App\Models\Admin\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    public function index(){

        return view('dashboard.settings.pages.index');


    }
    public function get_pages(Request $request){
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
        $totalRecords = Page::query()->where(['trader_id'=>Auth::id()])
            ->select('count(*) as allcount')->count();
        $totalRecordswithFilter = Page::query()->where(['trader_id'=>Auth::id()])
            ->select('count(*) as allcount')
            ->where(['trader_id'=>Auth::id(),['pages.title_en', 'like', '%' .$searchValue . '%']])
            ->orWhere(['trader_id'=>Auth::id(),['pages.title_ar', 'like', '%' .$searchValue . '%']])
            ->count();

        // Fetch records
        $records = Page::query()->where(['trader_id'=>Auth::id()])
            ->orderBy($columnName,$columnSortOrder)
            ->where(['trader_id'=>Auth::id(),['pages.title_en', 'like', '%' .$searchValue . '%']])
            ->orWhere(['trader_id'=>Auth::id(),['pages.title_ar', 'like', '%' .$searchValue . '%']])
//            ->select('name','file_no','address','mobile','age','id')
            ->skip($start)
            ->take($rowperpage)
            ->get();
//return $records;
        $data_arr = array();

        foreach($records as $record){


            $data_arr[] = array(
                "id" => $record->id,
                "title_ar" => $record->title_ar,
                "title_en" => $record->title_en,
                "status" => $record->status,
                "link" => $record->link,

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
    public function store(Request $request)
    {
//        return $request->all();

        $validator = Validator::make($request->all(), [
            'description_ar' => 'required',
            'title_ar' => 'required',

        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $input=$request->all();
            return response(["responseJSON" => $errors,"input"=>$input, "message" => 'يرجي التأكد من صحة البيانات وملئ جميع الحقول'], 422);
        }
        if ($validator->passes()) {

            $link =str_replace(' ', '-', $request->title_ar);
//            return $link;
            Page::query()->create([
                'title_ar'=>$request->title_ar,
                'title_en'=>$request->title_en,
                'trader_id' => Auth::id(),
                'desc_ar'=>$request->description_ar,
                'desc_en'=>$request->description_en,
                'link'=>$link,
            ]);
            $arr = array(
                'message_ar'=>"تمت العملية بنجاح",
                'message_en'=>"operation accomplished successfully",
                'status' => true
            );
            return Response()->json($arr);
        }

    }
    public function create(){
        $market=Market::query()->where('id',Auth::id())->with(['additional_setting'])->first();
        if ($market->additional_setting)
            $market->additional_setting->lang=json_decode($market->additional_setting->lang,true);
        $language=$market->additional_setting->lang;
        return view('dashboard.settings.pages.add', compact(  'language'));

    }
    public function edit($id){
        $page=Page::query()->findOrFail($id);
        $market=Market::query()->where('id',Auth::id())->with(['additional_setting'])->first();
        if ($market->additional_setting)
            $market->additional_setting->lang=json_decode($market->additional_setting->lang,true);
        $language=$market->additional_setting->lang;
        return view('dashboard.settings.pages.edit', compact(  'page','language'));

    }
    public function update(Request $request,$id){
        $page = Page::find($id);
//           return $request->all();

        $validator = Validator::make($request->all(), [
            'description_ar' => 'required',
            'title_ar' => 'required',

        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $input=$request->all();
            return response(["responseJSON" => $errors,"input"=>$input, "message" => 'يرجي التأكد من صحة البيانات وملئ جميع الحقول'], 422);
        }
        if ($validator->passes()) {
            if(isset($request->title_en)){
                $page->update([
                    'title_ar'=>$request->title_ar,
                    'title_en'=>$request->title_en,
                    'desc_ar'=>$request->description_ar,
                    'desc_en'=>$request->description_en,
                ]);
            }else{
                $page->update([
                    'title_ar'=>$request->title_ar,
                    'desc_ar'=>$request->description_ar,
                ]);
            }


            $arr = array(
                'message_ar'=>"تمت العملية بنجاح",
                'message_en'=>"operation accomplished successfully",
                'status' => true
            );
            return Response()->json($arr);
        }
    }
    public function status(Request $request,$id){
        $page=  Page::find($id);
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
            $page ->update($data);
            return response()->json([
                'message_ar'=>"تم تحديث حالة الصفحة",
                'message_en'=>"Page Status have been updated",

            ]);
        }

    }
    public function delete_all(Request $request)
    {
        $ids = $request->ids;
//        return $ids;
        $pages= Page::query()->whereIn('id',explode(",",$ids))->get();
        foreach ($pages as $page){
           $page->delete();
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
        $page =Page::find($id);
        // return $user;
        $page->delete();
        $arr = array('message_ar'=>"هناك بعض الاخطاء حاول مرة اخرى",
            'message_en'=>"There are some errors, try again",
            'status' => false);
        if($page){
            $arr = array(
                'message_ar'=>"تمت العملية بنجاح",
                'message_en'=>"operation accomplished successfully",
                'status' => true
            );
        }
        return Response()->json($arr);

    }
}
