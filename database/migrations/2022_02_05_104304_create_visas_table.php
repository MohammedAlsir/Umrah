<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visas', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();

            $table->string('visa_number');
            $table->string('guarantor_number');
            $table->string('guarantor_name');
            $table->string('guarantor_address');
            $table->longText('notes')->nullable();
            $table->string('work');
            $table->string('status')->nullable();
            $table->string('record_number');
            $table->string('passport_name');
            $table->foreignId('agent_id')->nullable()->constrained('agents')->onDelete('cascade');
            $table->string('agent_second_name')->nullable();
            $table->string('agent_second_phone')->nullable();
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
        Schema::dropIfExists('visas');
    }
}