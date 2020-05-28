<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUseraddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('useraddresses', function (Blueprint $table) {
            $table->increments('user_address_id');
            $table->integer('user_id');
            $table->string('address');
            $table->string('landmark');
            $table->string('city');
            $table->string('pincode');
            $table->string('country');
            $table->string('phone_no');
            $table->enum('is_default',['0', '1'])->default('0');
            
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
        Schema::dropIfExists('useraddresses');
    }
}
