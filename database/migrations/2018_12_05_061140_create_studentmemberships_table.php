<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentmembershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentmemberships', function (Blueprint $table) {
            $table->increments('student_member_id');
            $table->integer('user_id');
            $table->integer('address_id');
            $table->integer('membership_plan_id');
            $table->string('student_name');
            $table->string('student_email')->unique();
            $table->string('student_mobile')->unique();
        
            $table->string('student_unique_no');
            $table->string('referral_id');
            $table->string('college');
            $table->string('dept');
            $table->enum('is_expired',['0','1'])->default('0');
            $table->datetime('date_joined');
            $table->datetime('date_expired');
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
        Schema::dropIfExists('studentmemberships');
    }
}
