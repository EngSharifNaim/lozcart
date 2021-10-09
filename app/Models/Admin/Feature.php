<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;
    public function feature_plan(){
        return $this->hasMany(PlanFeature::class,'feature_id','id');
    }
}
