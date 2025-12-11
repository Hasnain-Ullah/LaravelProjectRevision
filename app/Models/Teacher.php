<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{ 
    public function information(){
        return $this->hasOne(information::class);
    }
}
