<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableUserClassSection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_class_section', function (Blueprint $table) {
            $table->id();
            $table->int('Teacher_ID');//unique() optional
            $table->foreign('Teacher_ID')->references('User_ID')->on('users')->onDelete('cascade');
            $table->int('Course_ID')->unique(); //unique() optional
            $table->foreign('Course_ID')->references('Course_ID')->on('courses')->onDelete('cascade');
            $table->int('Class_section_ID')->unique(); //unique() optional
            $table->foreign('Class_section_ID')->references('Class_ID')->on('class_sections')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_class_section');
    }
}
