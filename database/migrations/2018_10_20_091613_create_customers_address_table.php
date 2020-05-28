<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers_address', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id'); 
            $table->text('address'); 
            $table->string('city_village');
            $table->string('state');
            $table->string('pin_code');
            $table->string('country')->default('India');
            $table->string('country_code')->default('+91');
            $table->enum('is_primary',['1','0']);
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
        Schema::dropIfExists('CustomrsAddress');
    }
}
