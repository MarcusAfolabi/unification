<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{ 
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('image');
            $table->string('url');
            $table->text('content');
            $table->string('slug');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('status')->default(0);
            $table->integer('views')->default(0);
            $table->timestamps();
        });
    }
 
    public function down()
    {
        Schema::dropIfExists('videos');
    }
};
