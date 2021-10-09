<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LozCartPayment extends Model
{
    use HasFactory;
    protected $table='lozcart_payments';
    protected $guarded=[];
}
