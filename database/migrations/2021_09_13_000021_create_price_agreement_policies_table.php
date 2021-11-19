<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceAgreementPoliciesTable extends Migration
{
    public function up()
    {
        Schema::create('price_agreement_policies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('xray')->nullable();
            $table->string('xray_single')->nullable();
            $table->string('xray_both')->nullable();
            $table->string('xray_contrast')->nullable();
            $table->string('ct')->nullable();
            $table->string('ct_brain')->nullable();
            $table->string('ct_chest')->nullable();
            $table->string('ct_other')->nullable();
            $table->string('whole_abdomen')->nullable();
            $table->string('urogram')->nullable();
            $table->string('mri')->nullable();
            $table->string('mri_brain')->nullable();
            $table->string('mri_spine')->nullable();
            $table->string('mri_other')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
