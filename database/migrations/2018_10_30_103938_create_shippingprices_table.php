<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingpricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippingprices', function (Blueprint $table) {
            $table->increments('shippingprice_id');
            $table->integer('zone_id');
            $table->string('shipping_name');
            $table->decimal('shipping_price',10,2);
            $table->decimal('min_price',10,2);
            $table->decimal('max_price',10,2);
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
        Schema::dropIfExists('shippingprices');
    }
}
