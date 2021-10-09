<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryBrand extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function brand()
    {
        return $this->belongsTo(Brand::class,'brand_id','id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
