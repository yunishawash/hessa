<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_topics', function (Blueprint $table) {
          $table->increments('ot_id');
          $table->integer('fk_topic_id')->unsigned()->nullable();
          $table->foreign('fk_topic_id')->references('topic_id')->on('topics');
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
        Schema::dropIfExists('orders_topics');
    }
}
