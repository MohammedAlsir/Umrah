<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyRestrictionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_restrictions', function (Blueprint $table) {
            $table->id();
            $table->integer('debtor')->nullable(); //مدين // من
            $table->integer('Creditor')->nullable(); //دائن // الى
            $table->bigInteger('price'); //المبلغ
            $table->date('date'); //التاريخ
            $table->longText('Statement')->nullable(); //البيان
            $table->bigInteger('registration_number'); //رقم القيد
            $table->string('type'); //نوع القيد
            // قيود يومية  =>1
            // سندات قبض =>2
            // سندات صرف  =>3
            // دفعيات الوكلاء =>4
            // الافواج  =>5
            $table->foreignId('processe_id')->nullable()->constrained('processes')->onDelete('cascade');
            $table->foreignId('regiment_id')->nullable()->constrained('regiments')->onDelete('cascade');

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
        Schema::dropIfExists('daily_restrictions');
    }
}
