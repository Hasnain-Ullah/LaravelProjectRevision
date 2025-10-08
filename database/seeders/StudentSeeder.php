<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use Illuminate\Support\Facades\File;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { 
        // Multi dimensional array
        //  $students = collect([             
        //     [
        //         'name' => 'ahmad',
        //         'email' => 'ahmad@gmail.com',
        //         'user_phone' => '0345',
        //         'age' => '20'
        //     ],
        //     [
        //         'name' => 'hamza',
        //         'email' => 'hamza@gmail.com',
        //         'user_phone' => '0345',
        //         'age' => '20' 
        //     ],
        //     [
        //         'name' => 'zavi',
        //         'email' => 'zavi@gmail.com',
        //         'user_phone' => '0345',
        //         'age' => '20' 
        //     ],
        //     [
        //         'name' => 'fazal',
        //         'email' => 'fazal@gmail.com',
        //         'user_phone' => '0345',
        //         'age' => '20' 
        //     ],
        //     [
        //         'name' => 'hasain',
        //         'email' => 'hasnain@gmail.com',
        //         'user_phone' => '0345',
        //         'age' => '20' 
        //     ]
        // ]);
        // $students->each(function($student){
        //     Student::insert($student);
        // });

        // Student::create(
        // [
        //     'name' => 'kamran',
        //     'email' => 'kamran@gmail.com',
        //     'user_phone' => '0345',
        //     'age' => '20'
        // ]);

        // $json = File::get(path:'database/json/students.json');
        // $students = collect(json_decode($json));
        // $students->each(function($student){
        //     Student::create(
        //         [
        //             'name' => $student->name,
        //             'email' => $student->email
        //         ]
        //         );
        // });

        for($i = 0; $i <=30; $i++){
            Student::create([
                'name' => fake()->name(),
                'email' => fake()->unique()->email()
            ]);
        }
    }
}
