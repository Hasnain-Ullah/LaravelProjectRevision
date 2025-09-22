<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Home Page Route
Route::get('/', function () {  // Default route
    return view('welcome');    // Route is an inbuilt class and get is a static method to use
});                            // get we use scope resolution operator (::)

Route::get('/about' , function(){  // we can also return html file
    return "<h1> About Page </h1>";
});

Route::view('/hello','post');  // we give two two parameters first is route_name and 2nd is view_name

Route::get('/post/{id?}/{commentID?}', function(string $id = null , string $commentId = null){
    if($id){
        return "<h2>Post ID : ".$id."& Comment ID : ".$commentId."</h2>";
    }else{
        return "<h2>No Post ID Found</h2>";
    }
});