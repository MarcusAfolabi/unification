<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{ 
    public function up()
    {
        Schema::create('prayers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('status')->default(0);
            $table->text('content');
            $table->string('publication');
            $table->string('author');
            $table->string('category');
            $table->integer('views')->default(0);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('prayers');
    }
};
