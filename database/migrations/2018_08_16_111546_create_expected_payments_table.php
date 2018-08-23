<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpectedPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expected_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id');
            $table->integer('index');
            $table->float('value');
            $table->float('paid_value');
            $table->float('remaining_value');
            $table->dateTime('date');
            $table->string('state');
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
        Schema::dropIfExists('expected_payments');
    }
}
