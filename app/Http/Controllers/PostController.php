<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class PostController extends Controller
{
    public function index(){
        $posts = Post::with('comments')->get();  // with() joins comments with posts
        return $posts;

        // to fetch a particular records
        // $posts = Post::with('comments')->find(2);
        // $posts = Post::find(2);
        // $records = $posts->comments;
        // return $posts;

        // posts that does not have any comments
        // $posts = Post::doesntHave('comments')->get();
        // return $posts;

        // posts that have some comments
        // $posts = Post::has('comments')->get();
        // return $posts;

        // those posts that have some comments
        // $posts = Post::has('comments')->with('comments')->get();
        // return $posts;

        // posts that have comments greater than 3
        // $posts = Post::has('comments','>=',3)->with('comments')->get();
        // return $posts;
 
        // to count number of comments on a given post
        // $posts = Post::select(['title','author'])->withCount('comments')->get();
        // return $posts;
    }

    public function showComments(){
        $comments = Comment::with('posts')->get();
        return $comments;
        // foreach($comments  as $comment){
        //     echo "<div style='border:1px solid red;margin:0 0 10px'>
        //     <h3>{$comment->posts->title}</h3>
        //     <span>{$comment->posts->author}</span>
        //     <p>$comment->comment_text</p>
        //     </div>";
        // }

        // fetch a particular records using where clause
        // $comment = Comment::withWhereHas('posts' , function($query){
        //     $query->where('title','Post Title 3')
        //           ->orWhere('author','Author 2');
        // })->get();
        // return $comment;

        // 2nd method of fetching a particular records
        // $post = Post::where('title','Post Title 4')->get();
        // $comment = Comment::whereBelongsTo( $post )->get();
        // return $comment;
    }

    public function insertRecords(){
        // first method of inserting a new records
        // $records = new Comment([
        //     'commenter_name' => 'Hasnain',
        //     'comment_text' => 'this is the comment written by me',
        // ]);
        // $post = Post::find(3);
        // $post->comments()->save($records);

        // 2nd methods of inserting many records
        $post = Post::find(4);
        $post->comments()->createMany([
            [
                'commenter_name' => 'Basam',
                'comment_text' => 'this is the comment written by me',
            ],
            [
                'commenter_name' => 'Azhan',
               'comment_text' => 'this is the comment written by me',
            ]
            ]);
    }
}
