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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->nullable();
            $table->string('lastname')->nullable();
            $table->enum('role',['member', 'admin'])->default('member');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('gender')->default('Male');
            $table->string('phoneNumber')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('contact_address')->nullable();
            $table->string('academicStatus')->nullable();
            $table->string('unificationCurrentPost')->nullable();
            $table->string('levelInSchool')->nullable();
            $table->string('positionHeld')->nullable();
            $table->string('yourFellowship')->nullable();
            $table->string('unit_in_fellowship')->nullable();
            $table->string('qualification_one')->nullable();
            $table->string('degree_one')->nullable();
            $table->string('course_one')->nullable();
            $table->string('qualification_two')->nullable();
            $table->string('degree_two')->nullable();
            $table->string('course_two')->nullable();
            $table->string('qualification_three')->nullable();
            $table->string('degree_three')->nullable();
            $table->string('course_three')->nullable();
            $table->string('graduationYear')->nullable();
            $table->string('relationship_status')->nullable();
            $table->string('occupation')->nullable();
            $table->string('professional_skill')->nullable();
            $table->string('office_address')->nullable();
            $table->string('country_of_residence')->nullable();
            $table->string('password');
            $table->string('status')->default(0);
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
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
        Schema::dropIfExists('users');
    }
};
