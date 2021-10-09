<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingCountry extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function country(){
        return $this->belongsTo(Country::class,'country_id','id');
    }
}
