<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelTable extends Migration
{
    public function up()
    {
        Schema::create('travel', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('travel');
            $table->decimal('travel_cost', 15, 2)->nullable();
            $table->string('travel_destination_from')->nullable();
            $table->string('travel_destnitation_to')->nullable();
            $table->float('travel_destance', 15, 2)->nullable();
            $table->time('arrival_time')->nullable();
            $table->date('arrival_date')->nullable();
            $table->string('travel_status');
            $table->timestamps();
        });
    }
}
