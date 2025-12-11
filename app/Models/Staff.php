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
    protected $fillable = ['name', 'position', 'salary']; // Specify fillable fields for mass assignment
    public $incrementing = false; // Optional: if the primary key is not auto-incrementing
    protected $keyType = 'string'; // if you want to change the datatype of id from integer to string
    public $timestamp = false; // if you don't want to use created_at ans updated_at
    protected $dateFormat = 'U'; // to change the format of data and time 
    const CREATED_AT = 'Creation_date';
    const UPDATED_AT = 'Updated_date';
    protected $attributes = [
        'age' => 18,
        'city' => 'GOA',
    ];
    protected $connection = 'sqlite'; 
}
