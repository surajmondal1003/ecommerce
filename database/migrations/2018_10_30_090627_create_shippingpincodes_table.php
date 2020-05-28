<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingpincodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippingpincodes', function (Blueprint $table) {
            $table->increments('zone_pincode_id');
            $table->integer('zone_id');
            $table->string('pincode');
            $table->enum('available_cod',['yes','no'])->defaul('no');
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
        Schema::dropIfExists('shippingpincodes');
    }
}
