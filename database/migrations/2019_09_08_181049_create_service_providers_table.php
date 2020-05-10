<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_providers', function (Blueprint $table) {
          $table->increments('sp_id');
          $table->string('sp_full_name');
          $table->string('sp_mobile');
          $table->string('sp_email')->unique();
          $table->string('sp_facebook_id')->nullable();
          $table->string('sp_gender');
          $table->string('sp_community');
          $table->string('sp_address_1')->nullable();
          $table->string('sp_address_2')->nullable();
          $table->string('sp_street')->nullable();
          $table->string('sp_land_line_number')->nullable();
          $table->string('sp_emergency_number')->nullable();
          $table->string('sp_emergency_contact_name')->nullable();
          $table->date('sp_graduation_date')->nullable();
          $table->string('sp_do_b')->nullable();
          $table->string('sp_personal_passport_img_url', 255)->nullable();
          $table->string('sp_id_copy_url', 255)->nullable();
          $table->string('sp_id_number')->unique();
          $table->string('sp_working_status')->nullable();
          // Academic information
          $table->string('sp_high_school_branch')->nullable();
          $table->float('sp_high_school_average')->nullable();
          $table->string('sp_educational_level_degree')->nullable();
          $table->string('sp_study_year')->nullable();
          $table->string('sp_gpa')->nullable();
          // Experince Information
          $table->text('sp_practical_experience')->nullable();
          $table->text('sp_educational_experience')->nullable();
          $table->float('sp_education_experience_years')->nullable();
          $table->text('sp_skills')->nullable();
          $table->text('sp_trainings')->nullable();
          $table->text('sp_certifications')->nullable();
          $table->text('sp_transcript_attachment_url', 255)->nullable();
          // Service Delivery Information
          $table->string('sp_ability_to_teach_at_home')->nullable();
          $table->string('sp_ability_to_teach_levels')->nullable();
          $table->string('sp_ability_to_teach_other_topics')->nullable();
          $table->string('sp_ability_to_teach_other_languages')->nullable();
          $table->string('sp_ability_to_teach_days')->nullable();
          $table->string('sp_targeted_gender_to_teach')->nullable();
          $table->string('sp_notes')->nullable();
          // Service_administration
          $table->float('sp_initial_eval')->default(0.0)->nullable();
          $table->string('sp_profiling_stage')->nullable();
          $table->string('sp_status')->nullable()->default('active');
          $table->date('sp_join_date')->nullable();
          $table->float('sp_physical_interview_score')->default(0.0)->nullable();
          $table->float('sp_online_training_evaluation')->default(0.0)->nullable();
          $table->float('sp_sa_over_eval')->default(0.0)->nullable();
          $table->string('sp_sa_notes')->nullable();
          $table->string('sp_delivered_training_by_hessa')->nullable();
          $table->string('sp_contact_attachment_url')->nullable();
          // Others
          $table->rememberToken();
          $table->integer('fk_district_id')->unsigned()->nullable();
          $table->foreign('fk_district_id')->references('district_id')->on('districts');
          $table->integer('fk_location_id')->unsigned()->nullable();
          $table->foreign('fk_location_id')->references('location_id')->on('locations');
          $table->integer('fk_univ_id')->unsigned()->nullable();
          $table->foreign('fk_univ_id')->references('univ_id')->on('universities');
          $table->integer('fk_sa_id')->unsigned()->nullable();
          $table->foreign('fk_sa_id')->references('user_id')->on('users');
          $table->integer('fk_user_id')->unsigned()->nullable();
          $table->foreign('fk_user_id')->references('user_id')->on('users');
          $table->integer('fk_as_id')->unsigned()->nullable();
          $table->foreign('fk_as_id')->references('as_id')->on('academic_specializations');
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
        Schema::dropIfExists('service_providers');
    }
}
