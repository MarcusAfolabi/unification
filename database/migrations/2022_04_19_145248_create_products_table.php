<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{ 
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('status')->default(0);
            $table->string('slug');
            $table->string('type');
            $table->string('currency');
            $table->string('price');
            $table->string('category');
            $table->string('stock');
            $table->string('brand'); 
            $table->string('image');
            $table->string('image1')->nullable();
            $table->text('description');
            $table->integer('views')->default(0);   
            $table->timestamps();
        });
    }
 
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
