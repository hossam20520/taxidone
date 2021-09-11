<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('carname');
            $table->string('identity_num')->unique();
            $table->string('license_number')->unique();
            $table->string('insurance_policy_number')->nullable();
            $table->string('city');
            $table->timestamps();
        });
    }
}
