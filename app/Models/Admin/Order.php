<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function market(){
        return $this->belongsTo(Market::class,'trader_id','id');
    }
    public function order_address(){
        return $this->belongsTo(OrderAddress::class,'id','order_id')->with(['country','city']);
    }
    public function payment(){
        return $this->belongsTo(Payment::class,'payment_id','id');
    }
    public function shipping(){
        return $this->belongsTo(ShippingChoice::class,'shipping_id','id');
    }
    public function currency(){
        return $this->belongsTo(Country::class,'country_id','id');
    }
    public function use_coupon(){
        return $this->belongsTo(CouponUse::class,'id','order_id')->with('coupon');
    }
    public function details(){
        return $this->hasMany(OrderDetail::class,'order_id','id')
            ->with(['product','product_option','value_option']);
    }
    public function products(){
        return $this->hasMany(OrderDetail::class,'order_id','id')
            ->with(['product','product_option','value_option']);
    }
}
