<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFreeShippingPincodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('free_shipping_pincodes', function (Blueprint $table) {
            $table->increments('free_shipping_id');
            $table->integer('product_id');
            $table->string('pincode');
            $table->enum('status',['0','1'])->default('1');
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
        Schema::dropIfExists('free_shipping_pincodes');
    }
}
