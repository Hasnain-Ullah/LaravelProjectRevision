<?php

namespace App\Http\Controllers;

use App\Models\Awkum;
use Illuminate\Http\Request;

class AwkumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $students = Awkum::paginate(10);  // Retrieve all records from the 'awkum' table
        //$students = Awkum::find([1, 2, 3],['student_name','student_email']); // Retrieve records with specific IDs and retrieve specific 
        //$students = Awkum::count(); // Count total records in the 'awkum' table
        // $students = Awkum::min('id'); // Get the minimum value of the 'id' column and worked on integer data type
        // $students = Awkum::max('id'); // Get the maximum value of the 'id' column and worked on integer data type
        // $students = Awkum::avg('id'); // Get the average value of the 'id' column and worked on integer data type
        // $students = Awkum::sum('id'); // Get the sum of the 'id' column and worked on integer data type
        // $students = Awkum::where('id', '>', 5)->get(); // Retrieve records where 'id' is greater than 5
        // $students = Awkum::where([
        //     ['id', '>', 5],
        //     ['student_name', 'like', 'A%'],
        // ])->get();  // Retrieve records with multiple conditions
        // $students = Awkum::where('id', '>', 5)
        //             ->orWhere('student_name', 'like', 'A%')
        //             ->get(); // Retrieve records with OR condition

        // $students = Awkum::whereStudent_email('ali@gmail.com')   // Dynamic where method to retrieve records with specific email
        //             ->select('student_name', 'student_email as email')  // Select specific columns with alias(renaming a column )
        //             ->get(); // Retrieve the records based on the above conditions
                    //->toSql(); // Get the SQL query as a string running behind the Eloquent query
                    //->toRawSql(); // Get the raw SQL query with values bound
                    //->dd(); // Dump and die to see the query results immediately
                    //->ddRawSql(); // Dump and die to see the raw SQL query results with values also
        // $students = Awkum::where('id', '>', 5)
        //             ->whereNull('student_dob') // Retrieve records where 'student_dob' is NULL
        //             ->first(); // Get the first record matching the conditions

        // $students = Awkum::whereNotNull('student_dob')->get(); // Retrieve records where 'student_dob' is NOT NULL
        // $students = Awkum::whereIn('id', [1, 2, 3])->get(); // Retrieve records where 'id' is in the specified array
        // $students = Awkum::whereNotIn('id', [1, 2, 3])->get(); // Retrieve records where 'id' is NOT in the specified array
        // $students = Awkum::whereBetween('id', [5, 10])->get(); // Retrieve records where 'id' is between 5 and 10
        // $students = Awkum::whereNotBetween('id', [5, 10])->get(); // Retrieve records where 'id' is NOT between 5 and 10
        // $students = Awkum::orderBy('student_name', 'asc')->get(); // Retrieve records ordered by 'student_name' in ascending order
        // $students = Awkum::orderBy('student_name', 'desc')->get(); // Retrieve records ordered by 'student_name' in descending order
        // $students = Awkum::select('student_name', 'student_email')->get(); // Retrieve specific columns
        // $students = Awkum::paginate(10); // Paginate records, 10 per page
        // return $students;  // Return the records in JSON format
        // foreach($students as $student){
        //     echo "ID: " . $student->id . ", Name: " . $student->student_name . ", Email: " . $student->student_email . "<br>";
        // }

    
        return view('Eloquent-project.home', compact('students')); // Pass the records to the view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Eloquent-project.std_reg');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) // Store the new student record
    {
        $validate_date = $request->validate([
            'student_name' => 'required|string|max:255',
            'student_email' => 'required',
            'student_phone' => 'required|string|max:25',
            'student_address' => 'required|string|max:500',
            'student_dob' => 'required|date',
            'adm_status' => 'required|string|max:50',
            'adm_discipline' => 'required|max:100',
            'adm_campus' => 'required|string|max:100',
        ]);

        $student = new Awkum($validate_date); // Create a new instance of the Awkum model
        $student->student_name = $request->input('student_name');  // Assigning values to model properties
        $student->student_email = $request->input('student_email');  // right side is coming from form input
        $student->student_phone = $request->input('student_phone'); // left side is coming from database column
        $student->student_address = $request->input('student_address');
        $student->student_dob = $request->input('student_dob');
        $student->adm_status = $request->input('adm_status');
        $student_discipline = $request->input('adm_discipline');
        $student->adm_discipline = implode(',', $student_discipline); // Converting array to comma-separated string
        $student->adm_campus = $request->input('adm_campus');
        $student->save();

        // Method II - Using create method (Make sure to set $fillable in the model)
        // Mass Assignment
        // Awkum::create([
        //     'student_name' => $request->input('student_name'),
        //     'student_email' => $request->input('student_email'),
        //     'student_phone' => $request->input('student_phone'),
        //     'student_address' => $request->input('student_address'),
        //     'student_dob' => $request->input('student_dob'), 
        //     'adm_status' => $request->input('adm_status'),
        //     'adm_discipline' => implode(',', $request->input('adm_discipline')), // Converting array to comma-separated string
        //     'adm_campus' => $request->input('adm_campus'),
        // ]);  

        return redirect()->route('awkum.index')->with('success', 'Student registered successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Awkum $awkum)
    {
        $singleDetail = Awkum::find($awkum->id);
        return view('Eloquent-project.view_single_std', compact('singleDetail') );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Awkum $awkum)
    {
        $studentData = Awkum::find($awkum->id);
        return view('Eloquent-project.update_std', compact('studentData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Awkum $awkum)
    {
        $validate_data = $request->validate([
            'student_name' => 'required|string|max:255',
            'student_email' => 'required',
            'student_phone' => 'required|string|max:25',
            'student_address' => 'required|string|max:500',
            'student_dob' => 'required|date',
            'adm_status' => 'required|string|max:50',
            'adm_discipline' => 'required|max:100',
            'adm_campus' => 'required|string|max:100',
        ]);
        $updateStudent = Awkum::find($awkum->id);  // Find the record to be updated 
        $updateStudent->student_name = $request->input('student_name');
        $updateStudent->student_email = $request->input('student_email');
        $updateStudent->student_phone = $request->input('student_phone');
        $updateStudent->student_address = $request->input('student_address');
        $updateStudent->student_dob = $request->input('student_dob');
        $updateStudent->adm_status = $request->input('adm_status');
        $student_discipline = $request->input('adm_discipline');
        $updateStudent->adm_discipline = implode(',', $student_discipline); // Converting array to comma-separated string
        $updateStudent->adm_campus = $request->input('adm_campus');
        $updateStudent->save(); // Save the updated record
        
        // Method II to update record using update method
        // Mass Update Method
        // Awkum::where('id', $awkum->id)->update([
        //     'student_name' => $request->input('student_name'),   
        //     'student_email' => $request->input('student_email'),
        //     'student_phone' => $request->input('student_phone'),
        //     'student_address' => $request->input('student_address'),
        //     'student_dob' => $request->input('student_dob'),
        //     'adm_status' => $request->input('adm_status'),
        //     'adm_discipline' => implode(',', $request->input('adm_discipline')), // Converting array to comma-separated string
        //     'adm_campus' => $request->input('adm_campus'),
        // ]);  
        return redirect()->route('awkum.index')->with('success', 'Student record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete_student_reg  = Awkum::find($id);
        $delete_student_reg->delete();
        return redirect()->route('awkum.index')
                            ->with('success', 'Student record deleted successfully.');

        // Method II
        // Awkum::destroy($id);  // work only with primary keys
        // Awkum::destroy(12,13,14);  // delete multiple records

        // Method III
        // Awkum::truncate();  // delete all records from the table and reset auto-incrementing ID to zero
        

    }
}
