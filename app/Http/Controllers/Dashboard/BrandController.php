<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use App\Models\Admin\CategoryBrand;
use App\Models\Admin\Market;
use App\Models\Admin\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    public function index(){
        $categories=Category::query()->where(['market_id'=>Auth::id(),'parent'=>null])->with('child')->get();
        $market=Market::query()->where('id',Auth::id())->with(['additional_setting','country'])->first();
        if ($market->additional_setting)
            $market->additional_setting->lang=json_decode($market->additional_setting->lang,true);
        $language=$market->additional_setting->lang;
        return view('dashboard.brands.index', compact('categories','market','language'));

    }
    public function market_brands(Request $request){
//return $request->all();
        if (isset($request->categories)){
            $CategoryBrand=CategoryBrand::query()->whereIn('category_id',$request->categories)->with('brand')->get();
            $brands=[];
            foreach ($CategoryBrand as $item){
                $brands[]=$item->brand;
            }
//            $brands=Brand::query()->whereIn('categories',$request->categories)->get();
            return $brands;
        }
        else{
            return [];
        }

    }
    public function get_brands(Request $request){
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
        $totalRecords = Brand::query()->where('market_id',Auth::id())->select('count(*) as allcount')->count();
        $totalRecordswithFilter = Brand::query()->where('market_id',Auth::id())->select('count(*) as allcount')
            ->where('name_ar', 'like', '%' .$searchValue . '%')->count();

        // Fetch records
        $records = Brand::query()->where('market_id',Auth::id())->with('categories_brands')->orderBy($columnName,$columnSortOrder)
            ->where('brands.name_ar', 'like', '%' .$searchValue . '%')
//            ->select('name','file_no','address','mobile','age','id')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();

        foreach($records as $record){


            $data_arr[] = array(
                "id" => $record->id,
                "name" => $record->name,
                "name_ar" => $record->name_ar,
                "logo" => $record->image,
                "categories" => $record->categories_brands,
                "product_count" => Product::query()->where('brand_id',$record->id)->count(),
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
    public function store(Request $request){
//        return $request->all();
        $categories = json_decode('[' . $request->categories . ']',true);
//return $categories;
        DB::beginTransaction();
        try {
            if ($request->hasfile('image') ) {
                $image_brand = $request->file('image');
                $image_name = time().'.' .$image_brand->getClientOriginalExtension();
                $image_brand->move(public_path('uploads/brands/'), $image_name);
                $brand=Brand::query()->create([
                    'name'=>$request->name_en,
                    'name_ar'=>$request->name_ar,
                    'image'=>$image_name,
                    'market_id'=>Auth::id(),
//                    'categories'=>$request->categories,
                ]);
//                $categories = '[' . $request->categories . ']';

                foreach ( $categories as $item){
                    CategoryBrand::query()->create([
                        'category_id'=>$item,
                        'brand_id'=>$brand->id,
                    ]);
                }

            }
            $CategoryBrand=CategoryBrand::query()->whereIn('category_id',$categories)->with('brand')->get();
            $brands=[];
            foreach ($CategoryBrand as $item){
                $brands[]=$item->brand;
            }


            DB::commit();
        }catch (\Throwable $e){
            DB::rollBack();
            throw $e;
        }
        return response()->json([
            'items'=>['brands'=>$brands],
            'message'=> "تمت عملية  بنجاح",
            'status'=> 1,
            'status_code'=> 20,
        ]);
    }
    public function status(Request $request,$id){
        $brand=  Brand::find($id);
        $validator = Validator::make($request->all(), [
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response(["responseJSON" => $errors, "message" => 'هناك خطاء يرجى ملى جميع الحقول '], 422);
        }
        $data = $request->all();
        unset($data['_token']);

        $brand=  Brand::query()->where('id', $id)
            ->update($data);

        if ($validator->passes()) {
            return response()->json(['success'=>"تم تحديث حالة الماركة"]);
        }

    }
    public function edit($id){
        Brand::query()->findOrFail($id);

        $brand=Brand::query()->where('id',$id)->with('categories_brands')->first();
        $categories_id=[];
        foreach ($brand->categories_brands as $item){
            $categories_id[]=$item->category_id;
        }

        $categories=Category::query()->where(['market_id'=>Auth::id(),'parent'=>null])->with('child')->get();
        $market=Market::query()->where('id',Auth::id())->with(['additional_setting','country'])->first();
        if ($market->additional_setting)
            $market->additional_setting->lang=json_decode($market->additional_setting->lang,true);
        $language=$market->additional_setting->lang;
        return view('dashboard.brands.edit', compact('categories','brand','categories_id','market','language'));

    }
    public function update(Request $request,$id){
//        return $request->all();
        $brand=Brand::query()->find($id);
        $validator = Validator::make($request->all(), [
            'name_ar' => 'required',
            'name' => 'required',
            'categories' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            $input=$request->all();

            return response(["responseJSON" => $errors,"input"=>$input, "message" => 'تاكد من صحة البيانات وملئ جميع الحقول'], 422);
        }

        if ($validator->passes()) {
            DB::beginTransaction();
            try {
                if (isset($request->image)){
                    $logo = $request->file('image');
                    $image_name = time().'.' .$logo->getClientOriginalExtension();
                    $logo->move(public_path('uploads/brands/'), $image_name);
                    $oldImage=public_path('uploads/brands/'). $brand->image;
                    if ($oldImage){
                        unlink($oldImage);
                    }
                    $brand->update([
                        'name'=>$request->name,
                        'name_ar'=>$request->name_ar,
                        'image'=>$image_name,
                    ]);
                }else
                    $brand->update([
                    'name'=>$request->name,
                    'name_ar'=>$request->name_ar,
                ]);
                CategoryBrand::query()->where('brand_id',$id)->delete();
                foreach ($request->categories as $item)
                {
                    CategoryBrand::query()->create([
                        'category_id'=>$item,
                        'brand_id'=>$id
                    ]);
                }


                DB::commit();
            }
            catch (\Throwable $e){
                DB::rollBack();
                throw $e;
            }
            return response()->json(['success'=>"تمت العملية بنجاح",'status'=>1]);
        }
    }
    public function delete_all(Request $request)
    {
        $ids = $request->ids;
//        return $ids;
        Brand::query()->whereIn('id',explode(",",$ids))->delete();
        CategoryBrand::query()->whereIn('brand_id',explode(",",$ids))->delete();

        $arr = array('msg' => "تم حذف الماركات المحددة", 'status' => true);

        return Response()->json($arr);
    }
    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $brand =Brand::find($id);
            // return $user;
            CategoryBrand::query()->where('brand_id',$id)->delete();
            $brand->delete();

            DB::commit();
            if($brand){
                $arr = array('msg' => "تم حذف الماركة", 'status' => true);
            }
        }
        catch (\Throwable $e){
            DB::rollBack();
            throw $e;
            $arr = array('msg' => 'هناك بعض الاخطاء حاول مرة اخرى', 'status' => false);
        }

        return Response()->json($arr);

    }
}
