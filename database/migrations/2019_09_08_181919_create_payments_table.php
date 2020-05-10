<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('payment_id');
            $table->float('payment_amount')->default(0);
            $table->integer('fk_order_id')->unsigned()->nullable();
            $table->foreign('fk_order_id')->references('order_id')->on('orders');
            $table->integer('fk_session_id')->unsigned()->nullable();
            $table->foreign('fk_session_id')->references('session_id')->on('sessions');
            $table->integer('fk_sr_id')->unsigned()->nullable();
            $table->foreign('fk_sr_id')->references('sr_id')->on('service_requesters');
            $table->integer('fk_sp_id')->unsigned()->nullable();
            $table->foreign('fk_sp_id')->references('sp_id')->on('service_providers');
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
        Schema::dropIfExists('payments');
    }
}
