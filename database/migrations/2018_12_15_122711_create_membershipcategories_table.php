<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembershipcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membershipcategories', function (Blueprint $table) {
            $table->increments('membership_cat_id');
            $table->integer('membership_detail_id');
            $table->integer('category_id');
            $table->enum('status',['active','inactive'])->default('active');
            
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
        Schema::dropIfExists('membershipcategories');
    }
}
