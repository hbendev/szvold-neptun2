<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_subjects', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('subject_id');


            $table->foreign('student_id')->references('id')->on('users')->nullable();
            $table->foreign('subject_id')->references('id')->on('students_subjects')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students_subjects');
    }
}
