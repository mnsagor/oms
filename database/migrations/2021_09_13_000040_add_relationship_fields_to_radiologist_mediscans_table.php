<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRadiologistMediscansTable extends Migration
{
    public function up()
    {
        Schema::table('radiologist_mediscans', function (Blueprint $table) {
            $table->unsignedBigInteger('hospital_name_id')->nullable();
            $table->foreign('hospital_name_id', 'hospital_name_fk_4378948')->references('id')->on('hospital_mediscans');
        });
    }
}
