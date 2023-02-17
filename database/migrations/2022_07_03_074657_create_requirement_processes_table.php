<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequirementProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requirement_processes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('requirement_id')->nullable()->constrained('requirements')->onDelete('cascade');
            $table->foreignId('type_processes_id')->nullable()->constrained('type_processes')->onDelete('cascade');
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
        Schema::dropIfExists('requirement_processes');
    }
}