<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToHospitalMentorsTable extends Migration
{
    public function up()
    {
        Schema::table('hospital_mentors', function (Blueprint $table) {
            $table->unsignedBigInteger('price_agreement_policy_id')->nullable();
            $table->foreign('price_agreement_policy_id', 'price_agreement_policy_fk_4378668')->references('id')->on('price_agreement_policies');
            $table->unsignedBigInteger('cr_configuration_id')->nullable();
            $table->foreign('cr_configuration_id', 'cr_configuration_fk_4378670')->references('id')->on('config_cr_machines');
            $table->unsignedBigInteger('dr_configuration_id')->nullable();
            $table->foreign('dr_configuration_id', 'dr_configuration_fk_4378672')->references('id')->on('config_dr_machines');
            $table->unsignedBigInteger('mm_configuration_id')->nullable();
            $table->foreign('mm_configuration_id', 'mm_configuration_fk_4378674')->references('id')->on('config_mammography_machines');
            $table->unsignedBigInteger('ct_configuration_id')->nullable();
            $table->foreign('ct_configuration_id', 'ct_configuration_fk_4378676')->references('id')->on('config_ct_machines');
            $table->unsignedBigInteger('mri_configuration_id')->nullable();
            $table->foreign('mri_configuration_id', 'mri_configuration_fk_4378678')->references('id')->on('config_mri_machines');
            $table->unsignedBigInteger('hospital_hr_id')->nullable();
            $table->foreign('hospital_hr_id', 'hospital_hr_fk_4378682')->references('id')->on('hospital_hrs');
            $table->unsignedBigInteger('machine_available_profile_id')->nullable();
            $table->foreign('machine_available_profile_id', 'machine_available_profile_fk_4378694')->references('id')->on('machine_status_profiles');
        });
    }
}
