<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('product_id');
            $table->string('product_name');
            $table->string('product_url');
            $table->string('product_code');
            $table->text('description');
            $table->string('sku');
            $table->decimal('regular_price',10,2);
            $table->decimal('discount_price',10,2);
            $table->enum('taxable',['0', '1'])->default('1');
            $table->enum('is_supreme',['0', '1'])->default('1');
            $table->enum('is_active',['active', 'inactive'])->default('active');
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
        Schema::dropIfExists('products');
    }
}
