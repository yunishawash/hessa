
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceProvidersTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_providers_topics', function (Blueprint $table) {
          $table->increments('spat_id');
          $table->integer('fk_topic_id')->unsigned()->nullable();
          $table->foreign('fk_topic_id')->references('topic_id')->on('topics');
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
        Schema::dropIfExists('service_providers_topics');
    }
}
