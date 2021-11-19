<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProceduresTable extends Migration
{
    public function up()
    {
        Schema::table('procedures', function (Blueprint $table) {
            $table->unsignedBigInteger('modality_name_id');
            $table->foreign('modality_name_id', 'modality_name_fk_3700374')->references('id')->on('modalities');
            $table->unsignedBigInteger('procedure_type_id');
            $table->foreign('procedure_type_id', 'procedure_type_fk_3700375')->references('id')->on('procedure_types');
        });
    }
}
