<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_statuses', function (Blueprint $table) {
            $table->increments('order_status_id');
            $table->integer('order_id');
            $table->enum('status',['cancelled', 'cancelledreversal','chargeback','delivered',
            'denied','expired','failed','outofprint','pending','processed','processing',
            'refunded','reversed','shipped','voided','returnpending','returncomplete','awaitingproduct']);
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
        Schema::dropIfExists('order_statuses');
    }
}
