<?php

// path of inbuilt classes in laravel for migration
use Illuminate\Database\Migrations\Migration;   
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration  // anonymous class that extends Migration class 
                                    // this file returns an instance of this class
{
    /**
     * Run the migrations.
     */
    public function up(): void          // method to create table and add a column and returns nothing
    {  
        // to create table we use schema facade and create method
        // create method takes two parameters first is table name and
        // second is a closure that takes blueprint object as parameter
        // blueprint object is used to define columns of the table
        // inside the closure we define the columns of the table
        // $table is an instance of blueprint class
        // we can define columns using methods of blueprint class
        // for example $table->id() creates an id column
        // $table->timestamps() creates created_at and updated_at columns
        // schema facade is used to interact with the database schema
        Schema::create('students', function (Blueprint $table) {
            $table->id();             // creates an auto-incrementing id column
            $table->string('name');   // creates a string column for name
            $table->string('email')->unique(); // creates a string column for email and makes it unique
            $table->string('phone',11);
            $table->integer('age');   // creates an integer column for age
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void  // method to drop table and returns nothing
    {
        Schema::dropIfExists('students');
    }
};
