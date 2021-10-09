<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderAddress extends Model
{
    use HasFactory;
    public function country(){
        return $this->belongsTo(Country::class,'country_id','id');
    }
    public function city(){
        return $this->belongsTo(City::class,'city_id','id');
    }
}
