<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Awkum;

class AwkumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Awkum::create([
            'student_name' => 'John Doe',
            'student_email' => 'john@gmail.com',
            'student_phone' => '1234567890',
            'student_address' => '123 Main St, Cityville',
            'student_dob' => '2000-01-01',
            'adm_status' => 'Admitted',
            'adm_discipline' => 'Hons',
            'adm_campus' => 'Main Campus',
        ]);
        Awkum::create([
            'student_name' => 'Jane Smith',
            'student_email' => 'jane@gmail.com',
            'student_phone' => '0987654321',
            'student_address' => '456 Elm St, Townsville',
            'student_dob' => '1999-05-15',
            'adm_status' => 'Pending',
            'adm_discipline' => 'AI',
            'adm_campus' => 'Garden Campus',
        ]);
    }
}
