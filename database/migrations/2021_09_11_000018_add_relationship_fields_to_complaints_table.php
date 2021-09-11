<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToComplaintsTable extends Migration
{
    public function up()
    {
        Schema::table('complaints', function (Blueprint $table) {
            $table->unsignedBigInteger('client_id')->nullable();
            $table->foreign('client_id', 'client_fk_4853315')->references('id')->on('clients');
            $table->unsignedBigInteger('trip_id')->nullable();
            $table->foreign('trip_id', 'trip_fk_4853317')->references('id')->on('travel');
        });
    }
}
