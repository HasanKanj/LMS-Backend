<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserGradeSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_grade_sections', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('teacher_id');
            $table->foreign('teacher_id')->references('id')->on('userlms')->onDelete('cascade');
            
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('userlms')->onDelete('cascade');

            $table->unsignedBigInteger('grade_section_id');
            $table->foreign('grade_section_id')->references('id')->on('grade_sections')->onDelete('cascade');
            
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_grade_sections');
    }
}
