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
        Schema::table('students', function (Blueprint $table) {
            $table->string('phone')->nullable(); // adding phone column after email column
            $table->float('percentage', 5, 2)->nullable()->after('age'); // adding percentage column after age column
            //$table->dropColumn('age'); // dropping age column
            //$table->renameColumn('name', 'full_name'); // renaming name column to full_name
            //$table->string('address')->after('phone'); // adding address column after phone column
            //$table->integer('age')->change(); // changing age column to integer
            //$table->string('email')->unique()->change(); // changing email column to unique
            //$table->dropUnique(['email']); // dropping unique constraint from email column
            //$table->string('email')->nullable()->change(); // changing email column to nullable   
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            //
        });
    }
};
