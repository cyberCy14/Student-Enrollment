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
        Schema::create('major', function (Blueprint $table){
            $table->id();
            $table->string('name');
            $table->string('code')->unique();
            $table->unsignedBigInteger('program_id');
            $table->text('description');

            // $table->foreign('program_id')->references('id')
            //     ->on('program')
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('major');
    }
};
