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
        Schema::create('fourth_sub_conventions', function (Blueprint $table) {
            $table->id();
            $table->string('payment_proof');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('gender');
            $table->string('phone', 11);
            $table->string('fellowship_id');
            $table->string('academic_status');
            $table->string('fellowship_status');
            $table->string('unit_id');
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
        Schema::dropIfExists('fourth_sub_conventions');
    }
};
