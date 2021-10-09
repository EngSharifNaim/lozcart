<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function order_paypal(){
        return $this->hasMany(Order::class,'payment_id','id');
    }
    public function order_lozCart(){
        return $this->hasMany(Order::class,'payment_id','id');
    }
    public function orders(){
        return $this->hasMany(Order::class,'payment_id','id');
    }
    public function application(){
        return $this->belongsTo(LozCartPayment::class,'trader_id','trader_id');
    }
}
