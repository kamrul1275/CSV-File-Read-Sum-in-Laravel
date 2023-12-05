<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $guarded = [];


    function permission()
    {

        return $this->hasMany(Permission::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
