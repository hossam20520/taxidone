<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptiondriversTable extends Migration
{
    public function up()
    {
        Schema::create('subscriptiondrivers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->datetime('subscription_date')->nullable();
            $table->datetime('expiration_date')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }
}
