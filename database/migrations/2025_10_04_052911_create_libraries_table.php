<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('libraries', function (Blueprint $table) {
            $table->id();
            $table->string('book_name',40);
            $table->date('due_date')->nullable();
            $table->unsignedBigInteger('stu_id');
            $table->foreign('stu_id')
                  ->references('id')
                  ->on('students')
                  ->onUpdate('cascade')      // update primary key value in parent table will also update the foreign key value in child table
                  ->onDelete('cascade');    // delete primary key value in parent table will also delete the foreign key value in child table
                //   ->ondelete('set null');   // delete a record in parent table will set a null value in child table in child table
                //   ->onUpdate('restrict');       // it is bydefuilt
                //   ->onDelete('restrict');  

            // 2nd way of making a foreign key
            // $table->foreignId('student_id')   // foreign key is same as parent table name without s + id
            //       ->constrained()
            //       ->cascadeOnDelete()
            //       ->cascadeOnUpdate();

            // 3rd way to set a foreign key
            // $table->foreignId('stu_id')
            //       ->constrained('students');   // mention the tabke name
            $table->boolean('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libraries');
    }
};
