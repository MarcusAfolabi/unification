<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('fourth_conventions', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('gender');
            $table->string('phone', 11);
            $table->string('academic_status');
            $table->string('fellowship');
            $table->string('fellowship_status');
            $table->string('unit');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('fourth_conventions');
    }
};
