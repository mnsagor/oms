<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigDrMachinesTable extends Migration
{
    public function up()
    {
        Schema::create('config_dr_machines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hospital_name')->unique();
            $table->string('machine_name')->nullable();
            $table->string('ae_title')->unique();
            $table->string('port_number')->nullable();
            $table->string('main_ip')->nullable();
            $table->string('configured_ip')->nullable();
            $table->string('host_name')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
