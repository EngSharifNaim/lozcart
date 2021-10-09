<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingChoice extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function orders(){
        return $this->hasMany(Order::class,'shipping_id','id');
    }
    public function country(){
        return $this->belongsTo(Country::class,'country_id','id');
    }
}
