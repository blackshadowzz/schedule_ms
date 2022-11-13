<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classtables', function (Blueprint $table) {
            $table->id();
            $table->string('class_name',200);
            $table->unsignedBigInteger('schedule_id')->nullable();
            $table->unsignedBigInteger('room_id')->nullable();
            $table->unsignedBigInteger('teacher_id')->nullable();
            $table->string('grand_year',50)->nullable();
            $table->text('description',300)->nullable();
            $table->string('created_by',50)->nullable();
            $table->string('updated_by',50)->nullable();
            $table->foreign('schedule_id')->references('id')->on('schedules');
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('teacher_id')->references('id')->on('teachers');
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
        Schema::dropIfExists('classtables');
    }
};
