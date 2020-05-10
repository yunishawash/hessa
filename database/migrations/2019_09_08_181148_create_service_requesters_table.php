<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceRequestersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_requesters', function (Blueprint $table) {
            $table->increments('sr_id');
            $table->string('sr_full_name');
            $table->string('sr_mobile');
            $table->string('sr_email')->nullable();
            $table->string('sr_facebook_id')->nullable();
            $table->string('sr_gender')->nullable();
            $table->string('sr_community')->nullable();
            $table->string('sr_address_1')->nullable();
            $table->string('sr_address_2')->nullable();
            $table->string('sr_street')->nullable();
            $table->date('sr_join_date')->nullable();
            // keys
            $table->integer('fk_district_id')->unsigned()->nullable();
            $table->foreign('fk_district_id')->references('district_id')->on('districts');
            $table->integer('fk_location_id')->unsigned()->nullable();
            $table->foreign('fk_location_id')->references('location_id')->on('locations');
            $table->integer('fk_inserted_by')->unsigned()->nullable();
            $table->foreign('fk_inserted_by')->references('user_id')->on('users');
            $table->integer('fk_user_id')->unsigned()->nullable();
            $table->foreign('fk_user_id')->references('user_id')->on('users');
            $table->integer('fk_sa_id')->unsigned()->nullable();
            $table->foreign('fk_sa_id')->references('user_id')->on('users');
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
        Schema::dropIfExists('service_requesters');
    }
}
