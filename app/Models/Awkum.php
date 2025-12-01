<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Awkum extends Model
{
    // use HasFactory;   // Add this line to include the HasFactory trait
                      // HasFactory trait is used for model factories in Laravel

    // protected $table = 'awkums'; // Specify the table name if it doesn't follow Laravel's naming convention
    protected $fillable = [      // Specify the fillable attributes for mass assignment
        'student_name',
        'student_email',
        'student_phone',
        'student_address',
        'student_dob',
        'adm_status',
        'adm_discipline',
        'adm_campus'
    ];

    protected $guarded = []; // when we use create method of ORM then we use guarded property to avoid mass assignment error

    

    // public $timestamps = false; // Disable timestamps if not needed
}
