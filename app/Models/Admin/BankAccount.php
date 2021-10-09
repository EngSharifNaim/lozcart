<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function bank(){
        return $this->belongsTo(Bank::class,'bank_id','id');
    }
    public function country(){
        return $this->belongsTo(Country::class,'country_id','id');
    }
}
