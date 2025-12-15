<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    // The Eloquent model will automatically use the 'staff' table
    // No need to specify the table name if it follows Laravel's naming conventions
    use HasUuids;  // 36 long characters string 
    use HasUlids;  // // 26 long characters string
    protected $table = 'staffs'; // Optional: specify the table name if it doesn't follow conventions
    protected $primaryKey = 'id'; // Optional: specify the primary key if it's not 'id'
    protected $fillable = ['name', 'position', 'salary']; // Mass assignable attributes
    public $incrementing = false; // Optional: if the primary key is not auto-incrementing
    protected $keyType = 'string'; // if you want to change the datatype of id from integer to string
    public $timestamp = false; // if you don't want created_at and updated_at columns
    protected $dateFormat = 'U'; // to change the date format of created_at and updated_at columns and U is for unix timestamp 
    const CREATED_AT = 'Creation_date';    // to change the name of created_at column
    const UPDATED_AT = 'Updated_date';      // to change the name of updated_at column
    protected $attributes = [   // if user does not provide value then these default values will be used
        'age' => 18,            // default age for staff
        'city' => 'GOA',        // default city for staff
    ];
    protected $connection = 'sqlite';        // if you want to use different database connection for this model
}
