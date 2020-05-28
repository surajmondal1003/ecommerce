<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_metas', function (Blueprint $table) {
            $table->increments('category_meta_id');
            $table->integer('category_id');
            $table->text('meta_description')->nullable();
            $table->string('title')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->text('meta_robot')->nullable();
            $table->text('meta_revisit_after')->nullable();
            $table->text('canonical_link')->nullable();
            $table->text('og_locale')->nullable();
            $table->text('og_type')->nullable();
            $table->text('og_image')->nullable();
            $table->text('og_title')->nullable();
            $table->text('og_description')->nullable();
            $table->text('og_url')->nullable();
            $table->text('og_site_name')->nullable();
            $table->text('extraheadcode')->nullable();
            $table->string('msvalidate')->nullable();
            $table->string('p_domain_verify')->nullable();
            $table->string('alexaverifyid')->nullable();
            $table->string('dc_title')->nullable();
            $table->string('geo_region')->nullable();
            $table->string('geo_placename')->nullable();
            $table->string('geo_position')->nullable();
            $table->string('icbm')->nullable();
            $table->string('place_location_latitude')->nullable();
            $table->string('place_location_longitude')->nullable();
            $table->string('business_contact_street_address')->nullable();
            $table->string('business_contact_locality')->nullable();
            $table->string('business_contact_postal_code')->nullable();
            $table->string('business_contact_country_name')->nullable();
            $table->string('business_contact_email')->nullable();
            $table->string('business_contact_phone_number')->nullable();
            $table->string('business_contact_website')->nullable();
            $table->string('twitter_card')->nullable();
            $table->string('twitter_description')->nullable();
            $table->string('twitter_title')->nullable();
            $table->string('twitter_site')->nullable();
            $table->string('twitter_image')->nullable();
            $table->string('twitter_creator')->nullable();
            $table->string('ip_address')->nullable();
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
        Schema::dropIfExists('category_metas');
    }
}
