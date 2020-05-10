<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('order_id');
            $table->string('order_status')->default('pending');
            // Student Information
            $table->string('order_sr_relation_to_the_student')->nullable();
            $table->string('order_preferred_payment_method')->nullable();
            $table->string('order_student_name')->nullable();
            $table->string('order_student_gender')->nullable();
            $table->string('order_student_class')->nullable();
            $table->string('order_student_high_school_branch')->nullable();
            $table->text('order_order_summery')->nullable();
            // Service Information
            $table->string('order_other_topics')->nullable();//
            $table->string('order_other_languages')->nullable();//
            $table->string('order_session_location')->nullable();
            $table->string('order_notes')->nullable();
            $table->string('order_targeted_gender')->nullable();
            $table->string('order_initial_num_of_sessions')->nullable();
            // keys
            $table->integer('fk_sr_id')->unsigned()->nullable();
            $table->foreign('fk_sr_id')->references('sr_id')->on('service_requesters');
            $table->integer('fk_package_id')->unsigned()->nullable();
            $table->foreign('fk_package_id')->references('package_id')->on('packages');
            $table->integer('fk_assigned_to')->unsigned()->nullable();
            $table->foreign('fk_assigned_to')->references('sp_id')->on('service_providers');
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
        Schema::dropIfExists('orders');
    }
}
