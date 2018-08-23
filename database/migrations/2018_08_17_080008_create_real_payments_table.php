<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('expected_payment_id');
            $table->integer('project_id');
            $table->float('paid_value');
            $table->integer('transfer_method_id')->nullable();
            $table->integer('to_bank_id');
            $table->dateTime('date');
            $table->integer('from_bank_id')->nullable();
            $table->string('from_bank_number')->nullable();
            $table->string('check_number')->nullable();
            $table->string('paypal_email')->nullable();
            $table->string('transferer_name')->nullable();
            $table->string('attachement')->nullable();
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
        Schema::dropIfExists('real_payments');
    }
}
