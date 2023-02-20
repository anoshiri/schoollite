<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsGradesArmsTables extends Migration
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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender');
            $table->date('date_of_birth')->nullable();
            $table->string('email')->unique();
            $table->foreignId('current_arm_id')->nullable();
            $table->string('street')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->text('photos')->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();
        });

        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->unsignedBigInteger('teacher_id')->nullable();
            $table->timestamps();

            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
        });

        Schema::create('arms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->unsignedBigInteger('grade_id')->nullable();
            $table->timestamps();

            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');
        });

        Schema::create('arm_student', function (Blueprint $table) {
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('arm_id');
            $table->timestamps();

            $table->primary(['student_id', 'arm_id']);

            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('arm_id')->references('id')->on('arms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arm_student');
        Schema::dropIfExists('arms');
        Schema::dropIfExists('grades');
        Schema::dropIfExists('students');
    }
}

