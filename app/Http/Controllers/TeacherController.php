<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Information;


class TeacherController extends Controller
{
    public function show()
    {
        // $teachers = Teacher::with('information')->get();
        // return $teachers;
        // echo $teachers->name."<br>";
        // echo $teachers->information->email."<br>";

        // Using Where Clause
        // $teachers = Teacher::with('information')
        //                 ->where('name' , 'Amir')
        //                 ->get();  // work well for teacher table but give an error for information table
        // return $teachers;

        // withWhereHas Method
        // where will check the teacher table records and withWhereHas check the information table records
        // in which foreign ke key is used
        // $teachers = Teacher::where('gender','M')->withWhereHas('information' , function($query){
        //     $query->where('email','amir@gmail.com');
        // })->get();
        // return $teachers;

        // whereHas Method
        // whereHas method search the records in information table but display the records of teachers table
        //    $teachers = Teacher::where('gender','M')->WhereHas('information' , function($query){
        //     $query->where('email','amir@gmail.com');
        // })->get();
        // return $teachers;

    }

    public function showDataInverse(){
        $info = Information::with('teachers')->get();
        return $info;
    }

    public function createData(){
        $teachers = Teacher::create([
            'name' => 'Zaviyar',
            'age' => 6,
            'gender' => 'M'
        ]);
        $teachers->information()->create([
            'email' => 'zaviyar@gmail.com',
            'contact' => '3456789012',
            'subjects' => 'Lahore',
            'city' => 'peshawar'
        ]);
        return "Data Inserted Successfully";
    }
}
