<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void  // Create the 'awkums' table
    {
        Schema::create('awkums', function (Blueprint $table) {
            $table->id();
            $table->string('student_name', 100);
            $table->string('student_email',50)->unique();
            $table->string('student_phone')->unique();
            $table->string('student_address');
            $table->string('student_dob')->comment('Date of Birth');
            $table->string('adm_status');
            $table->string('adm_discipline')->comment('Discipline');
            $table->string('adm_campus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void  // Drop the 'awkums' table
    {
        Schema::dropIfExists('awkums');
    }
};
