<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processes', function (Blueprint $table) {
            // $table->increments('id');
            $table->id();

            $table->string('beneficiary');
            $table->string('beneficiary_phone');

            $table->foreignId('type_processe_id')->constrained('type_processes')->onDelete('cascade');
            $table->foreignId('agent_id')->constrained('agents')->onDelete('cascade');

            //0 no //1 ok
            $table->string('visa_number')->nullable();
            $table->string('status')->nullable();
            $table->string('status_2')->nullable();

            // $table->string('code')->nullable();

            // $table->bigInteger('agreement_amount');
            // $table->bigInteger('other_costs');
            // $table->bigInteger('insurance_amount');
            $table->bigInteger('dollar_price');
            $table->bigInteger('sr_price');


            // سعر نوع المعاملة بالدولار
            $table->bigInteger('price_type');
            // سعر نوع المعاملة بالريال
            $table->bigInteger('price_type_sr');


            // الاجمالي بالجنيه
            $table->bigInteger('total_boundsd');



            $table->longText('notes')->nullable();
            $table->string('profit')->nullable();


            // Last edit 23/May/2022
            // $table->string('passport_number')->nullable();
            // $table->string('serial_number')->nullable();
            // $table->string('date_entry')->nullable();
            // $table->string('expected_date')->nullable();

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
        Schema::dropIfExists('processes');
    }
}