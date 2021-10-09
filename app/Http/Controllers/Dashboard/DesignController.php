<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin\AdditionalSetting;
use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use App\Models\Admin\Design;
use App\Models\Admin\DesignDetails;
use App\Models\Admin\DesignSorting;
use App\Models\Admin\Market;
use App\Models\Admin\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DesignController extends Controller
{
    public function index(){
        $categories=Category::query()->where(['market_id'=>Auth::id(),'parent'=>null])->with('child')->get();
        $sort = DesignSorting::where('trader_id',Auth::id())->select('ids')->first();
        $sort = json_decode($sort->ids,true);
        $result = [];
//        return $sort;
        foreach ($sort as $component)
        {
            $designs=Design::query()->where('trader_id',Auth::id())->where('id',$component)->first();
            $result[]=$designs;

        }
        $market=Market::query()->where('id',Auth::id())->with(['additional_setting','country'])->first();
        $designs = json_decode(json_encode($result),true);
//        return $designs;
        $rates=Design::query()->where(['trader_id'=>Auth::id(),'type'=>'rates'])->first();

        return view('dashboard.settings.design.index',compact('categories','market','designs','rates'));
    }
    public function getModelItems(Request $request){
//        return $request->all();
        if ($request->model_val =='product'){
            $product=Product::query()->where('trader_id',Auth::id())->get();
            return $product;
        }
        if ($request->model_val =='category'){
            $categories=Category::query()->where(['market_id'=>Auth::id(),'parent'=>null])->with('child')->get();
            return $categories;
        }
        if ($request->model_val =='brand'){
            $brands=Brand::query()->where(['market_id'=>Auth::id(),'status'=>1])->get();
            return $brands;
        }

    }
    public function marketSetting(Request $request){
//        return $request->all();
        $setting=AdditionalSetting::query()->where('trader_id',Auth::id())->first();
        $setting->update([
            'primary_color'=>$request->primary_color,
            'font_color'=>$request->font_color,
        ]);
        return response()->json([
            'message_ar'=>"تم تحديث خصائص المتجر",
            'message_en'=>"Store properties have been updated",

        ]);
    }
    public function storeHomeSection(Request $request){
        $designDetails=[];
        if ($request->type=='multiple_square' || $request->type=='slider' ) {
            if (!$request->is_external_link) {


                foreach ($request->model as $key => $item) {
                    $designDetails[$key] = ['model' => $item];
                }
                foreach ($request->model_id as $key => $item) {
                    $designDetails[$key] += ['model_id' => $item];
                }
            }
            if ($request->type == 'multiple_square') {

                foreach ($request->inner_text as $key => $item) {
                    $designDetails[$key] += ['inner_text' => $item];
                }
            }
            foreach ($request->external_link as $key => $item) {
                $designDetails[$key] += ['external_link' => $item];
            }
            foreach ($request->image as $key => $item) {
                $designDetails[$key] += ['image' => $item];
            }
        }
//            $testArray = $request->model + $request->model_id+ $request->external_link;

//        return $designDetails;
        DB::beginTransaction();
        try {
            if ($request->type=='multiple_square' ){
                $design=Design::query()->create([
                    'title'=>$request->label_en,
                    'title_ar'=>$request->label_ar,
                    'type'=>$request->type,
                    'trader_id'=>Auth::id(),
                ]);
                $sort = DesignSorting::where('trader_id',Auth::id())->select('ids')->first();
                if ($sort){
                    $sort = json_decode($sort->ids,true);
                    $sort[]=$design->id;
                    DesignSorting::query()->updateOrCreate([
                        'trader_id'=>Auth::id()
                    ],[
                            'ids'=>json_encode($sort)
                        ]
                    );
                }else{
                    DesignSorting::query()->updateOrCreate([
                        'trader_id'=>Auth::id()
                    ],[
                            'ids'=>'['.$design->id.']'
                        ]
                    );
                }

                foreach ($designDetails as $item){
//return $item['image'];
                    $image = $item['image'];
                    $image_name = time().'.' .$image->getClientOriginalExtension();
                    $image->move(public_path('uploads/design/'), $image_name);
                    DesignDetails::query()->create([
                        'design_id'=>$design->id,
                        'external_link'=>$item['external_link'] ,
                        'inner_text'=>$item['inner_text'],
                        'model'=>$item['model'],
                        'model_id'=>$item['model_id'],
                        'image'=>$image_name,
                    ]);
                }
            }
            if ($request->type=='slider' ){
                $design=Design::query()->create([
                    'title'=>'Slider',
                    'title_ar'=>'سلايدر',
                    'type'=>$request->type,
                    'trader_id'=>Auth::id(),
                ]);
                $sort = DesignSorting::where('trader_id',Auth::id())->select('ids')->first();
                if ($sort){
                    $sort = json_decode($sort->ids,true);
                    $sort[]=$design->id;
                    DesignSorting::query()->updateOrCreate([
                        'trader_id'=>Auth::id()
                    ],[
                            'ids'=>json_encode($sort)
                        ]
                    );
                }else{
                    DesignSorting::query()->updateOrCreate([
                        'trader_id'=>Auth::id()
                    ],[
                            'ids'=>'['.$design->id.']'
                        ]
                    );
                }
                foreach ($designDetails as $item){
//return $item['image'];
                    $image = $item['image'];
                    $image_name = time().'.' .$image->getClientOriginalExtension();
                    $image->move(public_path('uploads/design/'), $image_name);
                    DesignDetails::query()->create([
                        'design_id'=>$design->id,
                        'external_link'=>$item['external_link'] ,
                        'model'=>$item['model'],
                        'model_id'=>$item['model_id'],
                        'image'=>$image_name,
                    ]);
                }
            }
            if ($request->type=='fixed_wide_banner' ){
                $design=Design::query()->create([
                    'title'=>'Fixed Wide Banner',
                    'title_ar'=>'بانر عريض ثابت',
                    'type'=>$request->type,
                    'trader_id'=>Auth::id(),
                ]);
                $sort = DesignSorting::where('trader_id',Auth::id())->select('ids')->first();
                if ($sort){
                    $sort = json_decode($sort->ids,true);
                    $sort[]=$design->id;
                    DesignSorting::query()->updateOrCreate([
                        'trader_id'=>Auth::id()
                    ],[
                            'ids'=>json_encode($sort)
                        ]
                    );
                }else{
                    DesignSorting::query()->updateOrCreate([
                        'trader_id'=>Auth::id()
                    ],[
                            'ids'=>'['.$design->id.']'
                        ]
                    );
                }
                    $image = $request->image;
                    $image_name = time().'.' .$image->getClientOriginalExtension();
                    $image->move(public_path('uploads/design/'), $image_name);
                    DesignDetails::query()->create([
                        'design_id'=>$design->id,
                        'external_link'=>$request->external_link ,
                        'model'=>$request->model ,
                        'model_id'=>$request->model_id ,
                        'image'=>$image_name,
                    ]);

            }
            if ($request->type=='rectangular_banner' ){
                $design=Design::query()->create([
                    'title'=>'Rectangular Banner',
                    'title_ar'=>'بانر مستطيل',
                    'type'=>$request->type,
                    'trader_id'=>Auth::id(),
                ]);
                $sort = DesignSorting::where('trader_id',Auth::id())->select('ids')->first();
                if ($sort){
                    $sort = json_decode($sort->ids,true);
                    $sort[]=$design->id;
                    DesignSorting::query()->updateOrCreate([
                        'trader_id'=>Auth::id()
                    ],[
                            'ids'=>json_encode($sort)
                        ]
                    );
                }else{
                    DesignSorting::query()->updateOrCreate([
                        'trader_id'=>Auth::id()
                    ],[
                            'ids'=>'['.$design->id.']'
                        ]
                    );
                }
                    $first_image = $request->first_image;
                    $name_first_image = time().'.' .$first_image->getClientOriginalExtension();
                    $first_image->move(public_path('uploads/design/'), $name_first_image);
                    DesignDetails::query()->create([
                        'design_id'=>$design->id,
                        'external_link'=>$request->external_link ,
                        'model'=>$request->first_model ,
                        'model_id'=>$request->first_model_id ,
                        'image'=>$name_first_image,
                    ]);
                    $second_image = $request->second_image;
                    $name_second_image = time().'.' .$second_image->getClientOriginalExtension();
                    $second_image->move(public_path('uploads/design/'), $name_second_image);
                    DesignDetails::query()->create([
                        'design_id'=>$design->id,
                        'external_link'=>$request->external_link ,
                        'model'=>$request->second_model ,
                        'model_id'=>$request->second_model_id ,
                        'image'=>$name_second_image,
                    ]);

            }


            DB::commit();
            return response()->json([
                'massage_ar'=>"تمت العملية بنجاح ",
                'massage_en'=>"The process has successfully",
                'status'=>1,
            ]);

        }
        catch (\Throwable $e){
            DB::rollBack();
            throw $e;
        }
    }
    public function clientsRates_enable(Request $request){
//        return $request->all();
        $design=Design::query()->create([
            'title'=>'Customer reviews',
            'title_ar'=>'آراء العملاء',
            'type'=>'rates',
            'trader_id'=>Auth::id(),
        ]);
        $sort = DesignSorting::where('trader_id',Auth::id())->select('ids')->first();
        if ($sort){
            $sort = json_decode($sort->ids,true);
            $sort[]=$design->id;
            DesignSorting::query()->updateOrCreate([
                'trader_id'=>Auth::id()
            ],[
                    'ids'=>json_encode($sort)
                ]
            );
        }else{
            DesignSorting::query()->updateOrCreate([
                'trader_id'=>Auth::id()
            ],[
                    'ids'=>'['.$design->id.']'
                ]
            );
        }
        return response()->json([
            'massage_ar'=>"تمت العملية بنجاح ",
            'massage_en'=>"The process has successfully",
            'status'=>1,
            'itemID'=>$design->id,
        ]);
    }
    public function storeSection(Request $request){
//        return $request->all();
        if ($request->type=='youtube_link')
        {
            $design=Design::query()->create([
                'title'=>'Youtube Link',
                'title_ar'=>'رابط يوتيوب',
                'type'=>$request->type,
                'content'=>$request->youtube_link,
                'trader_id'=>Auth::id(),
            ]);
            $sort = DesignSorting::where('trader_id',Auth::id())->select('ids')->first();
            if ($sort){
                $sort = json_decode($sort->ids,true);
                $sort[]=$design->id;
                DesignSorting::query()->updateOrCreate([
                    'trader_id'=>Auth::id()
                ],[
                        'ids'=>json_encode($sort)
                    ]
                );
            }else{
                DesignSorting::query()->updateOrCreate([
                    'trader_id'=>Auth::id()
                ],[
                        'ids'=>'['.$design->id.']'
                    ]
                );
            }
        }
        if ($request->type=='slider_product')
        {
            $design=Design::query()->create([
                'title'=>'Slider Products',
                'title_ar'=>'منتجات متحركة',
                'type'=>$request->type,
                'content'=>$request->category_id,
                'trader_id'=>Auth::id(),
            ]);
            $sort = DesignSorting::where('trader_id',Auth::id())->select('ids')->first();
            if ($sort){
                $sort = json_decode($sort->ids,true);
                $sort[]=$design->id;
                DesignSorting::query()->updateOrCreate([
                    'trader_id'=>Auth::id()
                ],[
                        'ids'=>json_encode($sort)
                    ]
                );
            }else{
                DesignSorting::query()->updateOrCreate([
                    'trader_id'=>Auth::id()
                ],[
                        'ids'=>'['.$design->id.']'
                    ]
                );
            }
        }

        return response()->json([
            'massage_ar'=>"تمت العملية بنجاح ",
            'massage_en'=>"The process has successfully",
            'status'=>1,
            'itemID'=>$design->id,
        ]);
    }
    public function updateSorting(Request $request){
//        return $request->all();
        DesignSorting::query()->updateOrCreate([
            'trader_id'=>Auth::id()
        ],[
            'ids'=>'['.$request->ids.']'
            ]
        );
        return response()->json([
            'massage_ar'=>"تمت العملية بنجاح ",
            'massage_en'=>"The process has successfully",
            'status'=>1,
        ]);
    }
    public function deleteHomeSection($id)
    {
        $design =Design::find($id);
        $details=DesignDetails::query()->where('design_id',$design->id)->delete();

        $sort = DesignSorting::where('trader_id',Auth::id())->select('ids')->first();
        if ($sort){
            $sort = json_decode($sort->ids,true);

            $arr = array_diff($sort, array($design->id));
//            return $arr;
            DesignSorting::query()->updateOrCreate([
                'trader_id'=>Auth::id()
            ],[
                    'ids'=>json_encode($arr)
                ]
            );
        }

        $design->delete();
        $arr = array('msg' => 'هناك بعض الاخطاء حاول مرة اخرى', 'status' => false);
        if($design){
            $arr = array(
                'massage_ar' => "تم الحذف",
                'massage_en' => "Has been deleted",
                'status' => 1,
                'type'=>$design->type);

        }
        return Response()->json($arr);

    }
}
