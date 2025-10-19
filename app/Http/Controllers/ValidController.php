<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest; // importing form request
use App\Rules\Uppercase; // importing custom validation rule

use Illuminate\Support\Facades\Validator;  // for manual validation 
use Closure; // for using Closure method in validation

class ValidController extends Controller
{
    public function validation_form(Request $request)
    { 
        $request->validate([
            'name' => ['required', 'min:3', 'max:20', new Uppercase],  // using custom validation rule
            'email' => ['required',function(string $attribute , mixed $value, Closure $fail){  // using Closure for custom validation
                if(!str_ends_with($value, '@gmail.com')){    // check if email ends with @gmail.com
                    $fail('The '.$attribute.' must be a gmail address.');   // custom error message
                }
            }],
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
        return $request->all(); //  to see all the form data
        dd($request->all()); // to stop the code execution and see the form data
    }

    public function loginUser(LoginRequest $req)  // using form request for validation
    {
        return $req->all();
        // return $req->only(['email','password']); // to get only specific fields
        // return $req->except(['_token']); // to exclude specific fields
    }
}
