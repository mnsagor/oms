<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToLeavesTable extends Migration
{
    public function up()
    {
        Schema::table('leaves', function (Blueprint $table) {
            $table->unsignedBigInteger('emp_name_id');
            $table->foreign('emp_name_id', 'emp_name_fk_4859355')->references('id')->on('users');
        });
    }
}
