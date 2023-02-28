<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableClassSection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_section', function (Blueprint $table) {
            $table->id();
            $table->int('Class_ID');//unique() optional
            $table->foreign('Class_ID')->references('Class_ID')->on('classs')->onDelete('cascade');
            $table->int('Section_ID'); //unique() optional
            $table->foreign('Section_ID')->references('Section_ID')->on('sections')->onDelete('cascade');
            $table->int('Section_ID'); //unique() optional
            $table->foreign('Section_ID')->references('Class_section_ID')->on('attendances')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_section');
    }
}
