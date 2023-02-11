<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{ 
    public function up()
    {
        Schema::create('executives', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position');
            $table->string('hobby');
            $table->string('email');
            $table->text('profile');
            $table->string('image');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');            
            $table->timestamps();
        });
    } 
    public function down()
    {
        Schema::dropIfExists('executives');
    }
};
