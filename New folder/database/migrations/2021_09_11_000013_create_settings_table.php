<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('draw_on_every_travel_a', 15, 2)->nullable();
            $table->integer('draw_on_every_travel_p')->nullable();
            $table->string('type');
            $table->timestamps();
        });
    }
}
