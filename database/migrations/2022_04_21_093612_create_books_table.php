<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{ 
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('slug');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('status')->default(0);
            $table->string('image');
            $table->string('file');
            $table->string('author');
            $table->integer('views')->default(0);
            $table->timestamps();
        });
    }
 
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
