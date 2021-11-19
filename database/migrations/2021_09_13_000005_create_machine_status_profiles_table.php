<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachineStatusProfilesTable extends Migration
{
    public function up()
    {
        Schema::create('machine_status_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hospital_name')->unique();
            $table->string('ct_center')->nullable();
            $table->string('mri_center')->nullable();
            $table->string('mammography_center')->nullable();
            $table->string('fpd_center')->nullable();
            $table->string('dr_center')->nullable();
            $table->string('cr_center')->nullable();
            $table->string('agfa_center')->nullable();
            $table->string('konica_center')->nullable();
            $table->string('fier_center')->nullable();
            $table->string('ecg_center')->nullable();
            $table->string('simence_center')->nullable();
            $table->string('gee_center')->nullable();
            $table->string('philips_center')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
