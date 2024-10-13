<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{ 
    public function up()
    {
        // Schema::create('subconventions', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('payment_proof');
        //     $table->string('firstname'); 
        //     $table->string('lastname');
        //     $table->string('email');
        //     $table->string('phone'); 
        //     $table->string('gender');
        //     $table->string('fellowship_id');
        //     $table->string('academic_status');
        //     $table->string('fellowship_status'); 
        //     $table->string('unit_id') ;
        //     $table->string('profile_image');
        //     $table->timestamps();
        // });
    }
 
    public function down()
    {
        // Schema::dropIfExists('subconventions');
    }
};
