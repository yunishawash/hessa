<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
          $table->increments('user_id');
          $table->string('user_name');
          $table->string('user_email')->unique();
          $table->string('user_type');
          $table->string('user_account_status')->default('active');
          $table->timestamp('user_email_verified_at')->nullable();
          $table->string('password');
          $table->rememberToken();
          $table->integer('fk_district_id')->unsigned()->nullable();
          $table->foreign('fk_district_id')->references('district_id')->on('districts');
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
        Schema::dropIfExists('users');
    }
}
