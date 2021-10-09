<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rate extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
