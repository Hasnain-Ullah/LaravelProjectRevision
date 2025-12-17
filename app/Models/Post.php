<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamp = true;
    protected $guarded = [];
    // one to many relationship with comments
    public function comments(){
        return $this->hasMany(Comment::class);  
    }

}
