<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bank_name')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('paypal_email')->nullable();
            $table->string('check_number')->nullable();
            $table->integer('transfer_method_id');
            $table->string('other_method_name')->nullable();
            $table->string('other_method_number')->nullable();
            $table->string('default_number')->nullable();
            $table->integer('employee_id');
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
        Schema::dropIfExists('employee_accounts');
    }
}
