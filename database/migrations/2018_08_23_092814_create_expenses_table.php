<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('expense_type_id');
            $table->string('details');
            $table->integer('project_id');
            $table->integer('service_id');
            $table->integer('client_id');
            $table->integer('bank_id');
            $table->integer('transfer_method_id');
            $table->float('value');
            $table->integer('percentage_id');
            $table->dateTime('date');
            $table->string('attachement');
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
        Schema::dropIfExists('expenses');
    }
}
