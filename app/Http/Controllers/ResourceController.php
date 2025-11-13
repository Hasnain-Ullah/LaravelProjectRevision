<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = DB::table('queries')->get();
        return view('resource_controller.show_users', ['registered_users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('resource_controller.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $request->validate([
            'name' => 'required|min:6|max:20', 
            'email' => 'required',
            'password' => 'required|min:6|max:12',
            'gender' => 'required|in:male,female',
            'hobbies' => 'required|array|min:1',
            'city' => 'required|in:karachi,lahore,islamabad,peshawar',
        ],
        [
            'name.required' => 'Name is required',
            'name.min' => 'Name must be at least 3 characters',
            'name.max' => 'Name must not exceed 20 characters',
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 6 characters',
            'password.max' => 'Password must not exceed 12 characters',
            'gender.required' => 'Gender is required',
            'gender.in' => 'Gender must be either male or female',
            'hobbies.required' => 'Please select at least one hobby',
            'hobbies.array' => 'Hobbies must be an array',
            'hobbies.min' => 'Please select at least one hobby',
            'city.required' => 'City is required',
            'city.in' => 'select a valid city'
        ]);
        $user = DB::table('queries')
                ->insert([
                    'username' => $request->name,
                    'useremail' => $request->email,
                    'userpassword' => Hash::make($request->password),
                    'usergender' => $request->gender,
                    'userhobbies' => implode(',', $request->hobbies),
                    'usercity' => $request->city,
                ]);
            if($user){
                return redirect()->route('resource.index')->with('status', 'User registered successfully!');
            } else {
                return back()->with('fail','User is not  registered successfully!');
            }
                
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = DB::table('queries')->where('id', $id)->first();  // fetch single user data by id from database 
        return view('resource_controller.single_user', ['user_data' => $user]);  // pass user data to view
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = DB::table('queries')->where('id', $id)->first();  // fetch single user data by id from database
        return view('resource_controller.edit_user', ['user_data' => $user]);  // pass user data to view
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $deleted = DB::table('queries')->where('id', $id)->delete();

    if ($deleted) {
        return redirect()->route('resource.store')->with('status', 'User deleted successfully!');
    } else {
        return redirect()->back()->with('error', 'Failed to delete user.');
    }
}

}
