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
        Schema::create('schedule_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('classtable_id')->nullable();
            $table->unsignedBigInteger('subject_id')->nullable();
            $table->unsignedBigInteger('room_id')->nullable();
            $table->unsignedBigInteger('teacher_id')->nullable();
            $table->unsignedBigInteger('semester_id')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('time',50);
            $table->string('day',100);
            $table->time('start_hour')->nullable();
            $table->time('end_hour')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->foreign('classtable_id')->references('id')->on('classtables');
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('teacher_id')->references('id')->on('teachers');
            $table->foreign('semester_id')->references('id')->on('semesters');
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
        Schema::dropIfExists('schedule_details');
    }
};
