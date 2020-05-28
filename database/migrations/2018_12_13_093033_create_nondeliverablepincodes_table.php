<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNondeliverablepincodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nondeliverablepincodes', function (Blueprint $table) {
            $table->increments('non_del_pin_id');
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
        Schema::dropIfExists('nondeliverablepincodes');
    }
}
