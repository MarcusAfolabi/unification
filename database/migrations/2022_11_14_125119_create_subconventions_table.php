<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
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
            $table->string('unification_status'); 
            $table->string('central_status'); 
            $table->foreignId('institution_id')->references('id')->on('institutions')->onDelete('cascade');
            $table->string('unit'); 
            $table->string('profile_image'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subconventions');
    }
};
