<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalHrsTable extends Migration
{
    public function up()
    {
        Schema::create('hospital_hrs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hopital_name')->unique();
            $table->string('chairman_name')->nullable();
            $table->string('chairman_number')->nullable();
            $table->string('md_name')->nullable();
            $table->string('md_number')->nullable();
            $table->string('director_name')->nullable();
            $table->string('director_number')->nullable();
            $table->string('manager_name')->nullable();
            $table->string('manager_number')->nullable();
            $table->string('am_name')->nullable();
            $table->string('am_number')->nullable();
            $table->longText('reception_details')->nullable();
            $table->string('accountant_name')->nullable();
            $table->string('accountant_number')->nullable();
            $table->string('mt_name_1')->nullable();
            $table->string('mt_number_1')->nullable();
            $table->string('mt_name_2')->nullable();
            $table->string('mt_number_2')->nullable();
            $table->string('mt_name_3')->nullable();
            $table->string('mt_number_3')->nullable();
            $table->string('mt_name_4')->nullable();
            $table->string('mt_number_4')->nullable();
            $table->string('mt_name_5')->nullable();
            $table->string('mt_number_5')->nullable();
            $table->string('ct_eng_name')->nullable();
            $table->string('ct_eng_number')->nullable();
            $table->string('it_person_name')->nullable();
            $table->string('it_person_number')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
