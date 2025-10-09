<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    // Allow mass assignment for factory/seeding
    protected $fillable = [
        'name',
        'age',
        'email',
        'address',
        'phone',
        'city',
        'password',
    ];

    // if you need casts or hidden fields
    protected $hidden = [
        'password',
    ];
}
