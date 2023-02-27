<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{ 
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname')->nullable();
            $table->enum('role',['member', 'admin'])->default('member');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('gender')->default('Male');
            $table->string('phone')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('address')->nullable();
            $table->string('academic_status')->nullable();
            $table->string('fellowship_status')->nullable();
            $table->string('school_level')->nullable();
            $table->foreignId('fellowship_id')->references('id')->on('fellowships')->onDelete('cascade');
            $table->foreignId('unit_id')->references('id')->on('units')->onDelete('cascade');
            $table->string('qualification_one')->nullable();
            $table->string('degree_one')->nullable();
            $table->string('course_one')->nullable(); 
            $table->string('year_graduated')->nullable();
            $table->string('relationship_status')->nullable();
            $table->string('occupation')->nullable();
            $table->string('professional_skill')->nullable();
            $table->string('country_of_residence')->nullable();
            $table->string('password');
            $table->string('status')->default(0);
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
        });
    } 
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
