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
        //Schema::rename('students','student'); rename an existing table
        // Schema::dropIfExists('table_name');    first it will check of they are exist then it will remove the table
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
