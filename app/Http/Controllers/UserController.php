<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($name)
    {
        // return view('welcome' , ['name' => $name]);
        return view('welcome' , compact('name')); // use when key name and variable name both are same
    }

    public function showData(){
        return "<h2> Return Something </h2>";
    }
}
