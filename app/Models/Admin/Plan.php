<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    public function services(){
        return $this->hasMany(PlanService::class,'plan_id','id');
    }
}
