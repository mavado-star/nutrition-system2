<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    protected $fillable = [
        'name',
        'age',
        'gender',
        'weight_kg',
        'height_cm',
        'muac_cm',
        'bmi',
        'village',
        'parent_name',
        'phone',
        'status'
    ];
}