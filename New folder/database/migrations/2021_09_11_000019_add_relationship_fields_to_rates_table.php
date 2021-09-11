<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRatesTable extends Migration
{
    public function up()
    {
        Schema::table('rates', function (Blueprint $table) {
            $table->unsignedBigInteger('travel_id')->nullable();
            $table->foreign('travel_id', 'travel_fk_4853296')->references('id')->on('travel');
            $table->unsignedBigInteger('client_id')->nullable();
            $table->foreign('client_id', 'client_fk_4853298')->references('id')->on('clients');
        });
    }
}
