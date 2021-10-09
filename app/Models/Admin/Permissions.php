<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission;

class Permissions extends Permission
{
    use HasFactory;
    public function children()
    {
        return $this->hasMany(Permissions::class, 'parent','id');
    }
}
