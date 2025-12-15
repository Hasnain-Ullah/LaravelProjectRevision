<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $table = 'informations'; 
    protected $guarded = [];  // to allow mass assignment
    public $timestamps = false;
    public function teachers(){
        return $this->belongsTo(Teacher::class , 'teacher_id' , 'id');  // inverse one to one relationship
    }
}
