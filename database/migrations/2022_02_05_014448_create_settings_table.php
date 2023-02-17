<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('dollar_price')->nullable();
            $table->bigInteger('sr_price')->nullable();

            $table->string('office_name')->nullable();
            // $table->string('office_name_en')->nullable();
            $table->string('address')->nullable();
            // $table->string('address_en')->nullable();
            $table->string('license_number')->nullable();
            $table->string('logo')->nullable();

            $table->string('phone_1')->nullable();
            $table->string('phone_2')->nullable();
            $table->string('email_1')->nullable();
            $table->string('email_2')->nullable();

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
        Schema::dropIfExists('settings');
    }
}