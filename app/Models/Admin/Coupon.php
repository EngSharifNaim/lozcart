<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function coupon_use(){
        return $this->hasMany(CouponUse::class,'coupon_id','id');
    }
    public function coupon_type(){
        return $this->belongsTo(TypeCoupon::class,'type','id');
    }
}
