<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TestingController;
use App\Http\Controllers\ValidController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\AwkumController;
use App\Http\Controllers\AdvanceMethodORMController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\TeacherController;





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
})->name('home2');                            // get we use scope resolution operator (::)

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
    Route::view('/first', 'Blade_Template.templateI');
    Route::view('/second', 'Blade_Template.templateII');
    Route::view('fourth','Blade_Template.templateIV');
});

Route::prefix('layout')->group(function(){  // we can group routes using prefix method
    Route::view('/master', 'layouts.masterlayout');
    Route::view('/home', 'layouts.home');
    Route::view('/about', 'layouts.about');
    Route::view('/contact', 'layouts.contact');
});

 function getUser(){
    return  [
        1 => ["Name" => "Ali" , "Phone" => "376537" , "City" => "peshawer"],
        2 => ["Name" => "Basam" , "Phone" => "376537" , "City" => "mardan"],
        3 => ["Name" => "Asad" , "Phone" => "376537" , "City" => "charsadda"],
        4 => ["Name" => "KAbir" , "Phone" => "376537" , "City" => "swat"],
    ];
};

Route::get('/data', function(){           // we can pass data from route to view
    $name = "Ali";
    $city = "Mardan";
    $passArray = getUser();
    
    // return view('passData', [             // here we are passing data to view using associative array
    //     'name' => $name ,
    //     'city' => $city,                  //  where key is the variable name in view and value is the data from route
    //     'script' => "<script>alert('hello');</script>"       
    // ]);
    
    // return view('passData')
    // ->with('name' , $name)
    // ->with('city' , $city)
    // ->with('script' , "<script>alert('hello');</script>"); // here we are passing data to view using with method

    return view('passData')
    ->withName($name)               // here we are passing data to view using with method + key name in capital but without comma
    ->withCity($city)
    ->withPassArray($passArray)
    ->withScript("<script>alert('hello');</script>");
});

Route::get('/user/{id}',function(int $id){
    $users = getUser();
    abort_if(!isset($users[$id]) , 404 );

    $user = $users[$id];
    return view('user',['data' => $user]);
})->name('view.user');

// Work with controller
Route::controller(UserController::class)->group(function(){
    Route::get('/home/{name}','show')->name('show.home');
    Route::get('/home2','showData')->name('data.home');
});

Route::get('/test',TestingController::class); // single action controller
                                            // automatically called

// Validation route
Route::view('/valid','valid_form');
Route::post('/validation',[ValidController::class ,'validation_form'])->name('validate.user');

Route::view('/login','login')->name('login'); // login route
Route::post('/loginuser',[ValidController::class,'loginUser'])->name('login.user');


Route::resource('/resource', ResourceController::class); // resource controller route

// Fallback Route
Route::fallback(function(){  // we can define a fallback route using fallback method
    return view('pageNotFound');
});

// Route for AwkumController
Route::resource('/awkum', AwkumController::class);  // Resource route for AwkumController

// Advance ORM Methods Route
Route::get('/advance/read', [AdvanceMethodORMController::class, 'readData'])->name('advance.orm.read');
Route::get('/advance/create', [AdvanceMethodORMController::class, 'createData'])->name('advance.orm.create');
Route::get('/advance/update', [AdvanceMethodORMController::class, 'updateData'])->name('advance.orm.update');
Route::get('/advance/delete', [AdvanceMethodORMController::class , 'deleteData'])->name('advance.orm.delete');

// Model conventions
Route::resource('/conventions', StaffController::class);

// One to one relationship
Route::get('/relation/one',[TeacherController::class , 'show']);

