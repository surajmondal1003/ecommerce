<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('order_id');
            $table->integer('user_id');
            $table->integer('address_id');
            $table->string('order_no');
            $table->string('invoice_no');
            $table->string('payment_id')->nullable();
            $table->decimal('itemtotal',10,2);
            $table->decimal('delivery_charge',10,2);
            $table->decimal('net_total',10,2);
            $table->decimal('coupon_amount',10,2)->default(0);
            $table->enum('paymentmode',['cod','instamojo','membership']);
            $table->enum('status',['cancelled', 'cancelledreversal',
            'chargeback','delivered','denied','expired','failed','outofprint',
            'pending','processed','processing','refunded','reversed','shipped',
            'voided','returnpending','returncomplete','awaitingproduct']);
            $table->enum('type',['normal', 'membership']);
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
        Schema::dropIfExists('orders');
    }
}
