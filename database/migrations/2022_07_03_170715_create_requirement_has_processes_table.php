<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequirementHasProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requirement_has_processes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('requirement_processes_id')->nullable()->constrained('requirement_processes')->onDelete('cascade');
            $table->foreignId('processes_id')->nullable()->constrained('processes')->onDelete('cascade');
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
        Schema::dropIfExists('requirement_has_processes');
    }
}
