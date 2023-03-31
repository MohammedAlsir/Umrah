<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegimentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regiments', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('num_day')->nullable();
            $table->string('hotel_cost')->nullable();
            $table->string('relay_cost')->nullable();
            $table->string('airline_name')->nullable();
            $table->string('airline_cost')->nullable();
            $table->string('status')->default(0);

            $table->string('revenues')->nullable();

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
        Schema::dropIfExists('regiments');
    }
}