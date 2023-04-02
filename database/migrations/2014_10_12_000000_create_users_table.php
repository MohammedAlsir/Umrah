<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('photo')->nullable();

            // for Role
            // $table->enum('agent_status', ['off', 'on']);
            // $table->enum('type_process_status', ['off', 'on']);
            // $table->enum('process_status', ['off', 'on']);
            // $table->enum('visa_status', ['off', 'on']);
            // $table->enum('final_delivery_status', ['off', 'on']);
            // $table->enum('trees_status', ['off', 'on']);
            // $table->enum('accounts_status', ['off', 'on']);
            // $table->enum('users_status', ['off', 'on']);
            // $table->enum('dollar_price_status', ['off', 'on']);
            // $table->enum('setting_status', ['off', 'on']);

            $table->string('agent_status')->nullable()->default('on');
            $table->string('company_status')->nullable()->default('on');
            $table->string('requirement_status')->nullable()->default('on');
            $table->string('process_status')->nullable()->default('on');
            $table->string('ticket_status')->nullable()->default('on');
            $table->string('final_delivery_status')->nullable()->default('on');
            $table->string('trees_status')->nullable()->default('on');
            $table->string('accounts_status')->nullable()->default('on');
            $table->string('check_account_status')->nullable()->default('on');

            $table->string('users_status')->nullable()->default('on');
            $table->string('report_status')->nullable()->default('on');

            $table->string('setting_status')->nullable()->default('on');

            $table->string('dollar_price_status')->nullable()->default('on');

            $table->string('regiment_status')->nullable()->default('on');




            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}