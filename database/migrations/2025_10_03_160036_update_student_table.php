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
            $table->renameColumn('phone','user_phone')->after('email');   // rename a column using renameColumn('from','to')
            $table->dropColumn('percentage');  // remove a column using dropColumn
            $table->string('age',20)->default('15')->comment('user age')->change(); // apply multiple changes using change() method
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
