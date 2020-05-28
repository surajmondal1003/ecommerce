<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembershipDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membership_details', function (Blueprint $table) {
            $table->increments('membership_detail_id');
            $table->integer('membership_id');
            $table->string('membership_plan');
            $table->string('membership_price');
            $table->string('membership_plan_code');
            $table->enum('status',['active', 'inactive'])->default('active');
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
        Schema::dropIfExists('membership_details');
    }
}
