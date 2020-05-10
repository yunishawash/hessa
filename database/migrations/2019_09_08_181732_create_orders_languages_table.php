<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_languages', function (Blueprint $table) {
          $table->increments('srl_id');
          $table->integer('fk_lang_id')->unsigned()->nullable();
          $table->foreign('fk_lang_id')->references('lang_id')->on('languages');
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
        Schema::dropIfExists('orders_languages');
    }
}
