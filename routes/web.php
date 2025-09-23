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

// we can also use where method to restrict the parameter type
Route::get('/user/{name}/{id}', function(string $name , int $id){
    return "<h2>User Name : ".$name." & User ID : ".$id."</h2>";
})
//->whereNumber('id'); // here we are restricting id to only numbers
//->whereAlpha('name'); // here we are restricting name to only alphabets
//->whereAlphaNumeric('name'); // here we are restricting name to only alphabets and numbers
//->whereIn('id', [1,2,3,4,5] , 'name',['Ali','Basam','Khuzaima']); // here we are restricting id to only 1,2,3,4,5
->where(['name' , '@[a-zA-Z]+', 'id' , '[0-9]+']);   // here we are restricting name to only alphabets and id to only numbers

Route::get('/admin', function(){
    return "<h2>Admin Page</h2>";
})->name('admin');  // we can give name to route using name method

Route::redirect('/admin', '/'); // we can redirect one route to another using redirect method

Route::prefix('users')->group(function(){  // we can group routes using prefix method
    Route::get('/profile', function(){
        return "<h2>User Profile Page</h2>";
    });
    Route::get('/settings', function(){
        return "<h2>User Settings Page</h2>";
    });
});

Route::prefix('template')->group(function(){  // we can group routes using prefix method
    Route::view('/one', 'first');
    Route::view('/two', 'second');
    Route::view('/three', 'third');
});

Route::fallback(function(){  // we can define a fallback route using fallback method
    return view('pageNotFound');
});