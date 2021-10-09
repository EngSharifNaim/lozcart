<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function categories(){
        return $this->hasMany(ProductCategory::class,'product_id','id')->with('category');
    }
    public function productImages(){
        return $this->hasMany(ProductImage::class,'product_id','id');
    }
    public function productOption(){
        return $this->hasMany(ProductOption::class,'product_id','id')->with('value');
    }
}
