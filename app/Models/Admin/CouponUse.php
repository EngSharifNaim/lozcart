<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponUse extends Model
{
    use HasFactory;
    public function coupon(){
        return $this->belongsTo(Coupon::class,'coupon_id','id');
    }
}
