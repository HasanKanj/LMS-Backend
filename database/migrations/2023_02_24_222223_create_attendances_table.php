<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('gradeSectionId');
            $table->foreign('gradeSectionId')->references('id')->on('grade_sections')->onDelete('cascade');
            
            $table->unsignedBigInteger('studentId')->unique();
            $table->foreign('studentId')->references('id')->on('userlms')->onDelete('cascade'); 

            $table->string('status');
            $table->date('date');
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
        Schema::dropIfExists('attendances');
    }
}
