<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitedHospitalsTable extends Migration
{
    public function up()
    {
        Schema::create('visited_hospitals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('status')->nullable();
            $table->string('email')->nullable();
            $table->longText('address')->nullable();
            $table->string('is_online')->nullable();
            $table->date('visited_date')->nullable();
            $table->string('visited_by');
            $table->string('other_company_name')->nullable();
            $table->string('other_company_price')->nullable();
            $table->string('dealing_tech')->nullable();
            $table->string('dealing_tech_number')->nullable();
            $table->string('bill_send_email')->nullable();
            $table->longText('management_software_propose')->nullable();
            $table->longText('comments')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
