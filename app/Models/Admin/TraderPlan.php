<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TraderPlan extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function plan(){
        return $this->belongsTo(Plan::class,'plan_id','id');
    }
}
