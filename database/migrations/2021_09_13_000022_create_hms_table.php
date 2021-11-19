<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHmsTable extends Migration
{
    public function up()
    {
        Schema::create('hms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->longText('address')->nullable();
            $table->string('email')->unique();
            $table->date('connection_date')->nullable();
            $table->string('network_ip')->nullable();
            $table->string('pathology_ip')->nullable();
            $table->string('reception_ip')->nullable();
            $table->string('xray_ip')->nullable();
            $table->string('ultrasonography_ip')->nullable();
            $table->string('admin_ip')->nullable();
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
            $table->longText('reception_all_numbers')->nullable();
            $table->string('ultra_sonogram_assistant_name')->nullable();
            $table->string('ultra_sonogram_assistant_number')->nullable();
            $table->string('medical_technologist_lab_name')->nullable();
            $table->string('medical_technologist_lab_number')->nullable();
            $table->string('medical_technologist_xray_name')->nullable();
            $table->string('medical_technologist_xray_number')->nullable();
            $table->string('accounts_department_name')->nullable();
            $table->string('accounts_department_number')->nullable();
            $table->string('receptionist_name')->nullable();
            $table->string('receptionist_number')->nullable();
            $table->string('accountant_name')->nullable();
            $table->string('accountant_number')->nullable();
            $table->string('bill_send_mail')->unique();
            $table->string('previous_company')->nullable();
            $table->string('it_person_name')->nullable();
            $table->string('it_person_number')->nullable();
            $table->string('installed_by')->nullable();
            $table->string('annual_maintenance_charge')->nullable();
            $table->string('connection_status');
            $table->string('conncetion_status_reason')->nullable();
            $table->string('connection_type');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
