<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{ 
    protected $guarded = [];
    public $timestamps = false;
    public function information(){
        return $this->hasOne(information::class);  // one to one relationship
    }
}
