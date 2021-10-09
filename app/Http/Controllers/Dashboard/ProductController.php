<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use App\Models\Admin\CategoryBrand;
use App\Models\Admin\CountryStore;
use App\Models\Admin\InfoProductOption;
use App\Models\Admin\Market;
use App\Models\Admin\Product;
use App\Models\Admin\ProductCategory;
use App\Models\Admin\ProductImage;
use App\Models\Admin\ProductOption;
use App\Models\Admin\Rate;
use App\Models\Admin\ValueOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    public function index(){
        $country_store=CountryStore::query()->where(['trader_id'=>Auth::id(),'is_main'=>1])->with('country')->first();

            return view('dashboard.products.index',compact('country_store'));

    }
    public function get_products(Request $request){
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
        $totalRecords = Product::query()->where(['trader_id'=>Auth::id()])->select('count(*) as allcount')->count();
        $totalRecordswithFilter = Product::query()->where(['trader_id'=>Auth::id()])->select('count(*) as allcount')
            ->where(['trader_id'=>Auth::id(),['name', 'like', '%' .$searchValue . '%']])
            ->orWhere(['trader_id'=>Auth::id(),['name_ar', 'like', '%' .$searchValue . '%']])
            ->count();
//        return $totalRecordswithFilter;
        // Fetch records
        $records = Product::query()->where(['trader_id'=>Auth::id()])->orderBy($columnName,$columnSortOrder)

            ->where(['trader_id'=>Auth::id(),['products.name', 'like', '%' .$searchValue . '%']])
            ->orWhere(['trader_id'=>Auth::id(),['products.name_ar', 'like', '%' .$searchValue . '%']])

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
                "price" => $record->price,
                "price_after_discount" => $record->price_after_discount,
                "quantity" => $record->quantity,
                "code" => $record->code,
                "status" => $record->status,
                "cover_image" => $record->cover_image,

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
    public function status(Request $request,$id){
        $product=  Product::find($id);
        $validator = Validator::make($request->all(), [
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response(["responseJSON" => $errors, "message" => 'هناك خطاء يرجى ملى جميع الحقول '], 422);
        }
        $data = $request->all();
        unset($data['_token']);


            $product->update($data);

        if ($validator->passes()) {
            return response()->json(['success'=>"تم تحديث حالة المنتج"]);
        }

    }
    public function uploadImages(Request $request){

        DB::beginTransaction();
        try {
                if ($request->hasfile('image') ) {
                    $image_product = $request->file('image');
                    $image_name = time().'.' .$image_product->getClientOriginalExtension();
                    $image_product->move(public_path('uploads/products/'), $image_name);

                }
            DB::commit();
        }catch (\Throwable $e){
            DB::rollBack();
            throw $e;
        }


        return response()->json([
            'file_name'=>$image_name,
            'status'=>1,
            'result'=>json_encode([$image_name])]);

    }
    public function ProductUploadImage(Request $request){
//        return $request->all();

        DB::beginTransaction();
        try {
                if ($request->hasfile('image') ) {
                    $image_product = $request->file('image');
                    $image_name = time().'.' .$image_product->getClientOriginalExtension();
                    $image_product->move(public_path('uploads/products/'), $image_name);
                    ProductImage::query()->create([
                        'product_id'=>$request->product_id,
                        'image_url'=>$image_name,
                    ]);

                }
            DB::commit();
        }catch (\Throwable $e){
            DB::rollBack();
            throw $e;
        }


        return response()->json([
            'file_name'=>$image_name,
            'status'=>1,
            'result'=>json_encode([$image_name])]);

    }
    public function deleteImage($name){
//        return $name;
        $oldImage=public_path('uploads/products/'). $name;
        if ($oldImage){
            unlink($oldImage);
        }
        return response()->json(['success'=>"تمت العملية بنجاح",'result'=>"[]"]);

    }
    public function ProductDeleteImage(Request $request,$name){
        ProductImage::query()->where(['product_id'=>$request->product_id,'image_url'=>$name])->delete();
        $oldImage=public_path('uploads/products/'). $name;
        if ($oldImage){
            unlink($oldImage);
        }
        return response()->json(['success'=>"تمت العملية بنجاح",'result'=>"[]"]);

    }
    public function create()
    {
        $categories=Category::query()->where(['market_id'=>Auth::id(),'parent'=>null])->with('child')->get();
        $brands=Brand::query()->get();
        $market=Market::query()->where('id',Auth::id())->with(['additional_setting','country'])->first();
        if ($market->additional_setting)
            $market->additional_setting->lang=json_decode($market->additional_setting->lang,true);
        $language=$market->additional_setting->lang;
//        return $language;
        $country_store=CountryStore::query()->where(['trader_id'=>Auth::id(),'is_main'=>1])->with('country')->first();
        $product=Product::query()->where('trader_id',Auth::id())->first();
        return view('dashboard.products.add', compact('categories','product','brands','market','country_store','language'));
    }
    public function store(Request $request){
//        foreach ($request->variants as $item){
//        return $request->all();
        $validator = Validator::make($request->all(), [
            'name_ar' => 'required',
            'product_images' => 'required',
            'cover_image' => 'required',
//            'code' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            $input=$request->all();

            return response(["responseJSON" => $errors,"input"=>$input, "message" => 'تاكد من صحة البيانات وملئ جميع الحقول'], 422);
        }

        if ($validator->passes()) {
            if (isset($request->status)){
                $status=1;
            }
            else{
                $status=0;
            }
            DB::beginTransaction();
            try {
                $product=Product::query()->create([
                    'name'=>$request->name,
                    'name_ar'=>$request->name_ar,
                    'price'=>$request->price,
                    'cost_price'=>$request->cost_price,
                    'quantity'=>$request->quantity,
                    'sale'=>$request->sale,
                    'code'=>$request->code,
                    'weight'=>$request->weight,
                    'cover_image'=>$request->cover_image,
                    'description_ar'=>$request->description_ar,
                    'description'=>$request->description_en,
                    'shipping'=>$request->shipping,
                    'brand_id'=>$request->brand_id,
                    'status'=>$status,
                    'trader_id'=>Auth::id(),
                ]);
//                return $product->id;
                $product_images=json_decode($request->product_images,true);
                foreach ($product_images as $image){
                    ProductImage::query()->create([
                        'product_id'=>$product->id,
                        'image_url'=>$image,
                    ]);
                }
                foreach ($request->categories as $category){
                    ProductCategory::query()->create([
                        'product_id'=>$product->id,
                        'category_id'=>$category
                    ]);
                }
                $option_array=[];
                if($request->options){
                    $market=Market::query()->where('id',Auth::id())->with(['additional_setting','country'])->first();
                    if ($market->additional_setting)
                        $market->additional_setting->lang=json_decode($market->additional_setting->lang,true);
                    $language=$market->additional_setting->lang;
                foreach ($request->options as $item){
                    foreach ($item as $content){
                        $name=null;
                        if(in_array('en',$language)){
                            $name=$content['title_en'];
                        }

                       $option= ProductOption::query()->create([

                            'name'=>$name,
                            'name_ar'=>$content['title_ar'],
                           'product_id'=>$product->id,
                        ]);
                       foreach ($content['content_details'] as $details){
                           $details_name=null;
                           if(in_array('en',$language)){
                               $details_name= $details['content_name_en'];
                           }
                           $details=ValueOption::query()->create([
                               'name'=>$details_name,
                               'name_ar'=>$details['content_name_ar'],
                               'option_id'=>$option->id,
                               'additional_price'=>$details['additional_price'],
                           ]);
                           $option_array[]=[
                               'option_id'=>$option->id,
                               'option_value_id'=>$details->id,
                               ];
                       }
                    }
                }
//                return $option_array;
//                    foreach ($option_array as $array){
                        foreach ($request->variants as $item){
//                            $f=0;
                            $variants_name=null;
                            if(in_array('en',$language)){
                                $variants_name= $item['name_en'];
                            }
                        InfoProductOption::query()->create(
//                            [
//
////                            'option_value_id'=>$array['option_id'],
//                            'option_value_id'=>$array['option_value_id'],
//                        ],
                            [
                            'name_ar'=>$item['name_ar'],
                            'name'=>$variants_name,
                            'quantity'=>$item['quantity'],
                        ]);
                    }
                }
//                }


                DB::commit();
            }
            catch (\Throwable $e){
                DB::rollBack();
                throw $e;
            }
            return response()->json(['message'=>__('The process has successfully'),'status'=>1]);
        }
    }
    public function edit(Request $request,$id){
        $product=Product::query()->where('id',$id)->with(['categories','productImages','productOption'])->first();
        $product_cat=$product->categories->pluck('category_id')->toArray();
//        return $product_cat;
        $categories=Category::query()->where(['market_id'=>Auth::id(),'parent'=>null])->with('child')->get();
//        $brands=Brand::query()->get();
        if ($product_cat !=null){
            $CategoryBrand=CategoryBrand::query()->whereIn('category_id',$product_cat)->with('brand')->get();
            $brands=[];
            foreach ($CategoryBrand as $item){
                $brands[]=$item->brand;
            }
//            $brands=Brand::query()->whereIn('categories',$request->categories)->get();
        }
        else{
            $brands=[];
        }
//        return $brands;
        $market=Market::query()->where('id',Auth::id())->with(['additional_setting','country'])->first();
        if ($market->additional_setting)
            $market->additional_setting->lang=json_decode($market->additional_setting->lang,true);
        $language=$market->additional_setting->lang;
//        return $language;
        $country_store=CountryStore::query()->where(['trader_id'=>Auth::id(),'is_main'=>1])->with('country')->first();

        return view('dashboard.products.edit', compact('product','country_store','categories','product_cat','brands','market','language'));
    }
    public function update(Request $request,$id){

//        $productOption->delete();
//        return $request->all();
        $product=Product::query()->find($request->product_id);
        $validator = Validator::make($request->all(), [
            'name_ar' => 'required',
//            'product_images' => 'required',
            'cover_image' => 'required',
//            'code' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            $input=$request->all();

            return response(["responseJSON" => $errors,"input"=>$input, "message" => 'تاكد من صحة البيانات وملئ جميع الحقول'], 422);
        }

        if ($validator->passes()) {
            if (isset($request->status)){
                $status=1;
            }
            else{
                $status=0;
            }
            DB::beginTransaction();
            try {
                $market=Market::query()->where('id',Auth::id())->with(['additional_setting','country'])->first();
                if ($market->additional_setting)
                    $market->additional_setting->lang=json_decode($market->additional_setting->lang,true);
                $language=$market->additional_setting->lang;
                if(in_array('en',$language)){
                    $product->update([
                        'name'=>$request->name,
                        'name_ar'=>$request->name_ar,
                        'price'=>$request->price,
                        'cost_price'=>$request->cost_price,
                        'quantity'=>$request->quantity,
                        'sale'=>$request->sale,
                        'code'=>$request->code,
                        'weight'=>$request->weight,
                        'cover_image'=>$request->cover_image,
                        'description_ar'=>$request->description_ar,
                        'description'=>$request->description_en,
                        'shipping'=>$request->shipping,
                        'brand_id'=>$request->brand_id,
                        'status'=>$status,
                        'trader_id'=>Auth::id(),
                    ]);
                }else{
                    $product->update([
                        'name_ar'=>$request->name_ar,
                        'price'=>$request->price,
                        'cost_price'=>$request->cost_price,
                        'quantity'=>$request->quantity,
                        'sale'=>$request->sale,
                        'code'=>$request->code,
                        'weight'=>$request->weight,
                        'cover_image'=>$request->cover_image,
                        'description_ar'=>$request->description_ar,
                        'shipping'=>$request->shipping,
                        'brand_id'=>$request->brand_id,
                        'status'=>$status,
                        'trader_id'=>Auth::id(),
                    ]);
                }

//                $product_images=json_decode($request->product_images,true);
//                foreach ($product_images as $image){
//                    ProductImage::query()->create([
//                        'product_id'=>$product->id,
//                        'image_url'=>$image,
//                    ]);
//                }
                foreach ($request->categories as $category){
                    ProductCategory::query()->updateOrCreate([
                        'product_id'=>$product->id,
                        'category_id'=>$category
                    ]);
                }
                $option_array=[];
                if($request->options) {

                    $productOption = ProductOption::query()->where('product_id', $request->product_id)->with('value')->get();
//         return $productOption;
                    if ($productOption->count() > 0) {
                        foreach ($productOption as $item) {
                            foreach ($item->value as $value) {
                                $value->delete();
                            }
                            $item->delete();
                        }
                    }
//                ProductOption::query()->where('product_id',$product->id)->value()->delete();
//                ProductOption::query()->where('product_id',$product->id)->delete();
                    foreach ($request->options as $item) {
                        foreach ($item as $content) {
                            if(in_array('en',$language)){
                                $options=[
                                    'name' => $content['title_en'],
                                    'name_ar' => $content['title_ar'],
                                    'product_id' => $product->id
                                ];
                            }else{
                                $options=[
                                    'name_ar' => $content['title_ar'],
                                    'product_id' => $product->id
                                ];
                            }
                            $option = ProductOption::query()->create($options);
                            foreach ($content['content_details'] as $details) {

                                if(in_array('en',$language)){
                                    $data=[
                                        'name' => $details['content_name_en'],
                                        'name_ar' => $details['content_name_ar'],
                                        'option_id' => $option->id,
                                        'additional_price' => $details['additional_price'],
                                    ];
                                }else{
                                    $data=[
                                        'name_ar' => $details['content_name_ar'],
                                        'option_id' => $option->id,
                                        'additional_price' => $details['additional_price'],
                                    ];
                                }
                                $details = ValueOption::query()->create($data);
                                $option_array[] = [
                                    'option_id' => $option->id,
                                    'option_value_id' => $details->id,
                                ];
                            }
                        }
                    }
//                return $option_array;
//                    foreach ($option_array as $array){
//                foreach ($request->variants as $item){
////                            $f=0;
//                    InfoProductOption::query()->create(
////                            [
////
//////                            'option_value_id'=>$array['option_id'],
////                            'option_value_id'=>$array['option_value_id'],
////                        ],
//                        [
//                            'name_ar'=>$item['name_ar'],
//                            'name'=>$item['name_en'],
//                            'quantity'=>$item['quantity'],
//                        ]);
//                }
//                }
                }

                DB::commit();
            }
            catch (\Throwable $e){
                DB::rollBack();
                throw $e;
            }
            return response()->json(['message'=>__('The process has successfully'),'status'=>1]);
        }
    }
    public function status_all_stop(Request $request)
    {
        $ids = $request->ids;
//        return $ids;
        Product::query()->whereIn('id',explode(",",$ids))->update(
            ['status'=>0]
        );

            $arr = array('msg' => __('The process has successfully'), 'status' => true);

        return Response()->json($arr);
    }
    public function status_all_allow(Request $request)
    {
        $ids = $request->ids;
//        return $ids;
        Product::query()->whereIn('id',explode(",",$ids))->update(
            ['status'=>1]
        );

            $arr = array('msg' => __('The process has successfully'), 'status' => true);

        return Response()->json($arr);
    }
    public function delete_all(Request $request)
    {
        $ids = $request->ids;
//        return $ids;
        Product::query()->whereIn('id',explode(",",$ids))->delete();
        Rate::query()->whereIn('product_id',explode(",",$ids))->delete();

            $arr = array('msg' =>  __('The process has successfully'), 'status' => true);

        return Response()->json($arr);
    }
    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $product =Product::find($id);
            // return $user;
            ProductImage::query()->where('product_id',$id)->delete();
            Rate::query()->where('product_id',$id)->delete();
            $productOption=ProductOption::query()->where('product_id',$id)->with('value')->get();
//         return $productOption;
            if ($productOption->count() >0) {
                foreach ($productOption as $item) {
                    foreach ($item->value as $value) {
                        $value->delete();
                    }
                    $item->delete();
                }
            }
            $product->delete();

            DB::commit();
                    if($product){
                        $arr = array('msg' =>  __('The process has successfully'), 'status' => true);
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
