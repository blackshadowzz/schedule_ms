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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name',100);
            $table->string('last_name',100);
            $table->string('gender',15);
            $table->date('dob');
            $table->string('email',130)->nullable();
            $table->string('phone',20)->nullable();
            $table->string('address',255)->nullable();
            $table->string('created_by',60)->nullable();
            $table->string('updated_by',60)->nullable();
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
        Schema::dropIfExists('students');
    }
};
