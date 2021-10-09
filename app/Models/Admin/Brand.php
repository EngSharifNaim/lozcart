<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $guarded=[];
   public function categories_brands(){
       return $this->hasMany(CategoryBrand::class,'brand_id','id')->with('category');
   }

}
