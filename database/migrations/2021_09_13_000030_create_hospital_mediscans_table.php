<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalMediscansTable extends Migration
{
    public function up()
    {
        Schema::create('hospital_mediscans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('user_name')->unique();
            $table->string('password');
            $table->string('email')->unique();
            $table->longText('address')->nullable();
            $table->date('connection_date');
            $table->string('cr_router_license_status')->nullable();
            $table->string('dr_router_license_status')->nullable();
            $table->string('mm_router_license_status')->nullable();
            $table->string('ct_router_license_status');
            $table->string('mri_router_license_status');
            $table->string('dropbox_mail_ip')->nullable();
            $table->string('dropbox_password')->nullable();
            $table->integer('profit_sharing_rate')->nullable();
            $table->string('bill_mail')->nullable();
            $table->longText('management_software_propose')->nullable();
            $table->string('installed_by')->nullable();
            $table->decimal('mininum_charge', 15, 2)->nullable();
            $table->decimal('annual_fee', 15, 2)->nullable();
            $table->string('others_company_name')->nullable();
            $table->date('router_reinstallation_date')->nullable();
            $table->string('connection_status')->nullable();
            $table->longText('conncetion_status_reason')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
