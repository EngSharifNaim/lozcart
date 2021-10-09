<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function child(){
        return $this->hasMany(Category::class,'parent','id');
    }
    public function sub_categories(){
        return $this->hasMany(Category::class,'parent','id');
    }
    public function categories()
    {
        //return $this->belongsToMany(RelatedModel, pivot_table_name, foreign_key_of_current_model_in_pivot_table, foreign_key_of_other_model_in_pivot_table);
        return $this->belongsToMany(
            Category::class,
            'category_brands',
            'brand_id',
            'category_id');
    }
}
