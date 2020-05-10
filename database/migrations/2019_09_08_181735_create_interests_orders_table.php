<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterestsOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interests_orders', function (Blueprint $table) {
            $table->increments('spio_id');
            $table->integer('fk_sp_id')->unsigned()->nullable();
            $table->foreign('fk_sp_id')->references('sp_id')->on('service_providers');
            $table->integer('fk_order_id')->unsigned()->nullable();
            $table->foreign('fk_order_id')->references('order_id')->on('orders');
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
        Schema::dropIfExists('interests_orders');
    }
}
