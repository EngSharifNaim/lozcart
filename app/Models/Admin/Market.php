<?php

namespace App\Models\Admin;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Market extends Authenticatable
{
    use HasFactory, Notifiable,HasRoles;
    protected $table='traders';
    protected $guarded =[];
    public function additional_setting(){
        return $this->belongsTo(AdditionalSetting::class,'id','trader_id');
    }
    public function country(){
        return $this->belongsTo(Country::class,'country_id','id');
    }
    public function links(){
        return $this->belongsTo(MarketSocial::class,'id','trader_id');
    }
    public function trader_plan(){
        return $this->belongsTo(TraderPlan::class,'plan_id','id');
    }
    public function plan(){
        return $this->belongsTo(TraderPlan::class,'plan_id','id');
    }
    protected $hidden = [
        'password',
    ];

}
