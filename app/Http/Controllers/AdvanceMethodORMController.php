<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Awkum;

class AdvanceMethodORMController extends Controller
{
    public function readData()
    {
        // Retrieve all records from the 'awkum' table
        // $awkumRecords = Awkum::where("id", ">", 0)
        //                         ->orderBy('id', 'asc')
        //                         ->get();  // Using the get() method to fetch all records
        // return response()->json($awkumRecords); // Return records as JSON response
        // foreach($awkumRecords as $record){
        //     echo "ID: " . $record->id . ", Name: " . $record->student_name . ", Email: " . $record->student_email . "<br>";
        // }

        // findorFail() method example
        // $record = Awkum::findOrFail(1); // Find record with given id or if id is not found it gives us 404 error
        // return response()->json($record); // Return record as JSON response

        // chunk method  // it uses more memory as compared to lazy method
        // Awkum::chunk(2 , function($awkumRecords)  // Retrieve the records in parts
        // {
        //     foreach($awkumRecords as $record){
        //     echo "ID: " . $record->id . ", Name: " . $record->student_name . ", Email: " . $record->student_email . "<br>";
        // }
        //     echo "<br>";
        // });

        // lazy methods  // it uses less memory as compared to chunk method 
        //  foreach(Awkum::lazy() as $record){
        //     echo "ID: " . $record->id . ", Name: " . $record->student_name . ", Email: " . $record->student_email . "<br>";
        // }
        // $awkumRecords = Awkum::lazy();
        // return view('view_name' , compact('awkumRecords'));

        // Cursor methods    // it uses least memory as compared to chunk and lazy method
        //  foreach(Awkum::cursor() as $record){
        //     echo "ID: " . $record->id . ", Name: " . $record->student_name . ", Email: " . $record->student_email . "<br>";
        // }

        // chunkById()    // it is more efficient than chunk method
        // Awkum::where("adm_status" , "Open")->chunk(2 , function($awkumRecords){
        //     $awkumRecords->each->update(["student_address" => "Mardan" ]);
        // });

        // lazyById()      // it is more efficient than lazy method
        // Awkum::where("adm_status" , "Self")
        //             ->lazyById(3)
        //             ->each->update(["student_address" => "Moscow"]);

    }

    public function createData()
    {
         // firstOrCreate() method // it checks if record exists with given attributes if not then it creates new record
        $awkumRecord = Awkum::firstOrCreate(
            ['student_name' => 'Maryam Gulll'],  // Attributes to check
            [                               // Attributes to set if record does not exist
                'student_email' => 'khan@gmail.com',
                'student_phone'=> '9876543210',
                'student_address' => 'Peshawar',
                'student_dob' => '2000-05-15',
                'adm_status' => 'Open',
                'adm_discipline' => 'AI',
                'adm_campus' => 'Garden'

            ]
        );
        return response()->json($awkumRecord); // Return the record as JSON response
    }

    public function updateData()
    {
        // updateOrcreate() // first it will check the records if it does not exist it will create a new records if it
        // exist it will update the records given in second parameters
        // $awkumRecords = Awkum::updateOrCreate(  
        //     ["student_name" => "Maryam Gulll" , "student_email" => "khangull@gmail.com"],
        //     ['student_phone'=> '982348912210',
        //         'student_address' => 'Lahore',
        //         'student_dob' => '2010-05-15',
        //         'adm_status' => 'Open',
        //         'adm_discipline' => 'Hons',
        //         'adm_campus' => 'Pabbi']
        // );
        // return response()->json($awkumRecords); // Return the record as JSON response

        // upsert() // 
        $awkumRecords = Awkum::upsert(
            [    // set the columns name and its values
                'student_name' => 'Maryam Gulll' ,
                'student_email' => 'khangull@gmail.com',
                'student_phone'=> '982348912210',
                'student_address' => 'Lahore',
                'student_dob' => '2010-05-15',
                'adm_status' => 'Open',
                'adm_discipline' => 'Hons',
                'adm_campus' => 'Shanker'
            ],
            ['student_email'], // in 2nd parameters we pass the unique columns name if that column value is exist it
                              // it update the columns passed in 3rd parameters  

            ['adm_campus']   // columns that can be updated
        );
         return response()->json($awkumRecords); // Return the record as JSON response

    }
}
        