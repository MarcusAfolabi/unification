<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{ 
    public function up()
    {
        Schema::create('audios', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('author');
            $table->string('image');
            $table->string('file')->nullable();
            $table->string('url')->nullable();
            $table->text('content');
            $table->string('slug');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('views')->default(0);
            $table->timestamps();
        });
    }
 
    public function down()
    {
        Schema::dropIfExists('audios');
    }
};
