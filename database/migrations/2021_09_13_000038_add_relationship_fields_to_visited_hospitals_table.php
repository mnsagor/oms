<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToVisitedHospitalsTable extends Migration
{
    public function up()
    {
        Schema::table('visited_hospitals', function (Blueprint $table) {
            $table->unsignedBigInteger('cr_configuration_id')->nullable();
            $table->foreign('cr_configuration_id', 'cr_configuration_fk_4839847')->references('id')->on('config_cr_machines');
            $table->unsignedBigInteger('dr_configuration_id')->nullable();
            $table->foreign('dr_configuration_id', 'dr_configuration_fk_4839848')->references('id')->on('config_dr_machines');
            $table->unsignedBigInteger('ct_configuration_id')->nullable();
            $table->foreign('ct_configuration_id', 'ct_configuration_fk_4839849')->references('id')->on('config_ct_machines');
            $table->unsignedBigInteger('mri_configuration_id')->nullable();
            $table->foreign('mri_configuration_id', 'mri_configuration_fk_4839850')->references('id')->on('config_mri_machines');
            $table->unsignedBigInteger('mm_configuration_id')->nullable();
            $table->foreign('mm_configuration_id', 'mm_configuration_fk_4839851')->references('id')->on('config_mammography_machines');
            $table->unsignedBigInteger('hospital_hr_id')->nullable();
            $table->foreign('hospital_hr_id', 'hospital_hr_fk_4839852')->references('id')->on('hospital_hrs');
        });
    }
}
