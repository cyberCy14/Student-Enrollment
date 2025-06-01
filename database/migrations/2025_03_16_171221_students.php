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
        Schema::create('students', function (Blueprint $table) {
            // $table->unsignedBigInteger('std_no')->primary();
            $table->id();
            // $table->unsignedBigInteger('std_num', 9);
            $table->string('fname');
            $table->string('lname');
            $table->string('mname')->nullable();
            $table->enum('gender', ['M', 'F']);
            $table->date('date_of_birth');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
