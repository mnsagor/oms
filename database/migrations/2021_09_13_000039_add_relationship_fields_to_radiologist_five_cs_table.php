<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRadiologistFiveCsTable extends Migration
{
    public function up()
    {
        Schema::table('radiologist_five_cs', function (Blueprint $table) {
            $table->unsignedBigInteger('hospital_name_id')->nullable();
            $table->foreign('hospital_name_id', 'hospital_name_fk_4839697')->references('id')->on('hospital_five_c_networks');
        });
    }
}
