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
        Schema::create('stud_enrollment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('std_num');
            $table->unsignedBigInteger('program_id');
            $table->unsignedBigInteger('major_id')->nullable();
            $table->enum('year_level', ['1', '2', '3', '4']);
            $table->unsignedBigInteger('year_semester_id');
            $table->unsignedBigInteger('subject_id');

            $table->foreign('std_num')->references('id')
                ->on('students')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('program_id')->references('id')
                ->on('program')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('subject_id')->references('id')
                ->on('subject')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            
            $table->foreign('major_id')->references('id')
                ->on('major')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreign('year_semester_id')->references('id')
                ->on('year_level_semester')
                ->onUpdate('cascade')
                ->onDelete('restrict');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stud_enrollment', function (Blueprint $table) {
            $table->dropForeign(['std_num']);
            $table->dropForeign(['program_id']);
            $table->dropForeign(['subject_id']);
            $table->dropForeign(['major_id']);
            $table->dropForeign(['year_semester_id']);
        });

        Schema::dropIfExists('stud_enrollment');
    }
};
