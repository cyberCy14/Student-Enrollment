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
        Schema::create('subject', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('name');
            $table->string('professor');
            $table->unsignedBigInteger('program_id')->nullable();
            $table->enum('year_level', ['1', '2', '3', '4'])->nullable();
            $table->enum('semester', ['1', '2'])->nullable();
            
            // $table->foreign('program_id')->references('id')
            //     ->on('program')
            //     ->onUpdate('cascade')
            //     ->onDelete('set null');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject');
    }
};
