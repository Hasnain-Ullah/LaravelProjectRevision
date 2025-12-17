<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamp = true;
    protected $guarded = [];
    public function posts(){
        return $this->belongsTo(Post::class , 'post_id' , 'id');
    }
}
