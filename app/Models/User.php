<?php

namespace App\Models;

use App\Models\Admin\Country;
use App\Models\Admin\Order;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $guarded=[];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function orders(){
        return $this->hasMany(Order::class,'user_id','id');
    }
    public function country(){
        return $this->belongsTo(Country::class,'country_id','id');
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
