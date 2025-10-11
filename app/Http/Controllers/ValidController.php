<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidController extends Controller
{
    public function validation_form(Request $request)
    { 
        $request->validate([
            'name' => 'required|min:3|max:20',
            'email' => 'required',
            // 'password' => 'required|min:6|max:12',
            'gender' => 'required|in:male,female',
            'hobbies' => 'required|array|min:1',
            'city' => 'required|in:karachi,lahore,islamabad,peshawar',
        ],
        [
            'name.required' => 'Name is required',
            'name.min' => 'Name must be at least 3 characters',
            'name.max' => 'Name must not exceed 20 characters',
            'email.required' => 'Email is required',
            // 'password.required' => 'Password is required',
            // 'password.min' => 'Password must be at least 6 characters',
            // 'password.max' => 'Password must not exceed 12 characters',
            'gender.required' => 'Gender is required',
            'gender.in' => 'Gender must be either male or female',
            'hobbies.required' => 'Please select at least one hobby',
            'hobbies.array' => 'Hobbies must be an array',
            'hobbies.min' => 'Please select at least one hobby',
            'city.required' => 'City is required',
            'city.in' => 'select a valid city'
        ]);
        return $request->all();
    }
}
