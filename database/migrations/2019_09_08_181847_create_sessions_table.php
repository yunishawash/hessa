<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->increments('session_id');
            // SP
            $table->date('session_date');
            $table->time('session_time');
            $table->float('session_period'); // hourly
            $table->text('session_notes')->nullable();//sp or sa
            $table->string('session_status')->default('not_done');//planned,delivered
            // SR
            $table->float('session_sp_review_score')->default(0.0);
            $table->text('session_sr_notes')->nullable();
            // SA
            $table->float('session_price');// calculated
            $table->text('session_payment_method')->nullable();//
            $table->float('session_sa_paid')->default(0.0);
            $table->float('session_cheque_num')->nullable();
            // keys and booleans
            $table->boolean('is_session_sp_paid')->default(false);// sp take the money from the SR
            $table->boolean('is_session_sa_paid')->default(false);// sa take the money from the SR
            $table->integer('fk_order_id')->unsigned()->nullable();
            $table->foreign('fk_order_id')->references('order_id')->on('orders');
            $table->integer('fk_sr_id')->unsigned()->nullable();
            $table->foreign('fk_sr_id')->references('sr_id')->on('service_requesters');
            $table->integer('fk_sp_id')->unsigned()->nullable();
            $table->foreign('fk_sp_id')->references('sp_id')->on('service_providers');
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
        Schema::dropIfExists('sessions');
    }
}
