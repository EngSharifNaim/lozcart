<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function value(){
        return $this->hasMany(ValueOption::class,'option_id','id');
    }
//    public function delete() {
//        $this->value()->delete();
//        parent::delete();
//    }

}
