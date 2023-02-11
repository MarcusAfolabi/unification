<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{ 
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->string('position'); //the title of the job opportunity
            $table->string('company'); // the company that's sharing the job opportunities
            $table->string('location')->nullable(); // the company location
            $table->string('type')->nullable(); // Full-time, Part-time, Remote, Intern, bootcamp
            $table->string('website'); // the company website or apply button link
            $table->string('salary')->nullable(); // the stated salary
            $table->string('currency')->nullable(); // the stated salary
            $table->text('description'); // the full job description
            $table->string('deadline')->nullable(); // the job deadline
            $table->string('image')->nullable(); // the respective image
            $table->string('slug');
            $table->string('scheme')->nullable();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('status')->default(0);
            $table->integer('views')->default(0);
            $table->timestamps();
        });
    } 
    public function down()
    {
        Schema::dropIfExists('vacancies');
    }
};
