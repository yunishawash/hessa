<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceProvidersLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_providers_languages', function (Blueprint $table) {
          $table->increments('spl_id');
          $table->integer('fk_lang_id')->unsigned()->nullable();
          $table->foreign('fk_lang_id')->references('lang_id')->on('languages');
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
        Schema::dropIfExists('service_providers_languages');
    }
}
