<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRadiologistMentorsTable extends Migration
{
    public function up()
    {
        Schema::create('radiologist_mentors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('degree')->nullable();
            $table->longText('address')->nullable();
            $table->string('phone_number')->unique();
            $table->string('email')->unique();
            $table->date('joining_date')->nullable();
            $table->string('reporting_price');
            $table->string('payment_method')->nullable();
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
