<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // one to many relationship with comments
    public function comments(){
        return $this->hasMany(Comment::class);  
    }

}
