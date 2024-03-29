<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solutions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();

            $table->string('solution');
            $table->string('filePath')->nullable();

            $table->integer('rating')->nullable();
            $table->integer('rating_time')->nullable();
            $table->string('review')->nullable();

            $table->unsignedBigInteger('task_id')->nullable();
            $table->foreign('task_id')->references('id')->on('tasks');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solutions');
    }
}
