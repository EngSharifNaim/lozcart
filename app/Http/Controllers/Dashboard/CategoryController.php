<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Market;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(){
        $categories=Category::query()->where(['market_id'=>Auth::id(),'parent'=>null])->with('child')->get();
        $market=Market::query()->where('id',Auth::id())->with(['additional_setting','country'])->first();
        if ($market->additional_setting)
            $market->additional_setting->lang=json_decode($market->additional_setting->lang,true);
        $language=$market->additional_setting->lang;
        return view('dashboard.categories.index', compact('categories','market','language'));

    }
    public function delete($id){
        Category::query()->where('id',$id)->delete();
        Category::query()->where('parent',$id)->delete();
        $categories=Category::query()->where(['market_id'=>Auth::id(),'parent'=>null])->with('sub_categories')->get();

        return response()->json([
            'message'=>"تمت العملية بنجاح",
            'categories'=>$categories,
            'status_code'=>200,
            'status'=>true,

        ]);
    }
    public function delete_sub($id){
        Category::query()->where('id',$id)->delete();

        $categories=Category::query()->where(['market_id'=>Auth::id(),'parent'=>null])->with('sub_categories')->get();

        return response()->json([
            'message'=>"تمت العملية بنجاح",
            'categories'=>$categories,
            'status_code'=>200,
            'status'=>true,

        ]);
    }
    public function activate(Request $request,$id){
        Category::query()->where('id',$id)->update(['status'=>1]);


        return response()->json([
            'message'=>"تمت العملية التفعيل بنجاح",
            'status_code'=>200,
            'status'=>true,

        ]);
    }
    public function deactivate(Request $request,$id){
        Category::query()->where('id',$id)->update(['status'=>0]);


        return response()->json([
            'message'=>"تمت العملية التعطيل بنجاح",
            'status_code'=>200,
            'status'=>true,

        ]);
    }
    public function store(Request $request){
//        return Auth::id();
//        return $request->all();
//        foreach ($request->categories as $item){
//            return $item['id'];
//        }
DB::beginTransaction();
        try {
            foreach ($request->categories as $item){
//                $category=0;
                if ($item['id'] == 0){
//                    return $item;
//                return $item['id'];
//                    $category=new Category();
//                    $category->market_id = Auth::id();
//                    $category->name_ar = $item['name_ar'];
//                    $category->name = $item['name'];
//                    $category->status = $item['status'];
//                    $category->save();
                    if (isset($item['status'])){
                        $status=1;
                    }else{
                        $status=0;
                    }
                    if (isset($item['name'])){
                        $name=$item['name'];
                    }else{
                        $name=null;
                    }

                    $category= Category::query()->create (
                        [
                            'market_id'=>Auth::id(),
                            'name_ar'=>$item['name_ar'],
                            'name'=>$name,
                            'status'=>$status,
                        ]);

//                    return $category;
                }else {
//                    return 'h
                    $category = Category::find($item['id']);
                    if (isset($item['name'])){
                        Category::query()->where(['id' => $item['id']])->update(
                            [
                                'market_id'=>Auth::id(),
                                'name_ar' => $item['name_ar'],
                                'name' => $item['name'],
//                            'status' => $item['status'],
                            ]);
                    }else{
                        Category::query()->where(['id' => $item['id']])->update(
                            [
                                'market_id'=>Auth::id(),
                                'name_ar' => $item['name_ar'],
                            ]);
                    }

                }
                if (isset($item['subs'])){
                    foreach ($item['subs'] as $sub){
                        if ($sub['id'] ==0){
                            if (isset($sub['name'])){
                                $name_sub=$sub['name'];
                            }else{
                                $name_sub=null;
                            }
                            Category::query()->create(
                                [
                                    'market_id'=>Auth::id(),
                                    'name_ar'=>$sub['name_ar'],
                                    'name'=>$name_sub,
                                    'parent'=>$category->id,
//                            'status'=>$sub['status'],
                                ]);
                        }else{
                            if (isset($sub['name'])){
                                Category::query()->where(['id' => $sub['id']])->update(
                                    [
                                        'market_id'=>Auth::id(),
                                        'name_ar'=>$sub['name_ar'],
                                        'name'=>$sub['name'],
                                    ]);
                            }else{
                                Category::query()->where(['id' => $sub['id']])->update(
                                    [
                                        'market_id'=>Auth::id(),
                                        'name_ar'=>$sub['name_ar'],
                                    ]);
                            }

                        }

                    }
                }

            }
            DB::commit();
        }catch (\Throwable $e){
            DB::rollBack();
            throw $e;
        }

        $categories=Category::query()->where(['market_id'=>Auth::id(),'parent'=>null])->with('sub_categories')->get();

        return response()->json([
            'message'=>"تمت العملية بنجاح",
            'items'=>['categories'=>$categories],
            'status_code'=>200,
            'status'=>true,

        ]);
    }
}
