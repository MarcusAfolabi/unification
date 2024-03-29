<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{ 
    public function up()
    {
        Schema::create('subconventions', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('lastname');
            $table->string('firstname'); 
            $table->string('gender');
            $table->string('phone'); 
            $table->string('academic_status');
            $table->string('fellowship_status'); 
            $table->string('unit_id') ;
            $table->string('fellowship_id')->nullable();
            $table->string('fellowship_name');
            $table->timestamps();
        });
    }
 
    public function down()
    {
        Schema::dropIfExists('subconventions');
    }
};
