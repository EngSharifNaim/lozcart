<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table='details';
    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function product_option(){
        return $this->belongsTo(ProductOption::class,'option_id','id');
    }
    public function value_option(){
        return $this->belongsTo(ValueOption::class,'value_option_id','id');
    }

}
