<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentmembershipproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentmembershipproducts', function (Blueprint $table) {
            $table->increments('membership_product_id');
            $table->integer('member_id');
            $table->integer('product_id');
            $table->enum('status',['pending','delivered','ordered','notapplicable']);
            $table->enum('is_orderable',['yes','no']);
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
        Schema::dropIfExists('studentmembershipproducts');
    }
}
