<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Salary;

class Employee extends Model
{
    use HasFactory;

    protected $guarded=['employe_id'];


    function salary(){

        return $this->hasOne(Salary::class,'Employee_Id', 'id');
        
    }

    protected static function boot()
    {
        parent::boot();
    
        static::creating(function ($employee) {
            // Your creating event logic
        });
    }
}
