<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->date('purchase_date')->nullable();
            $table->string('warrenty')->nullable();
            $table->string('price');
            $table->string('credit');
            $table->string('due')->nullable();
            $table->string('is_damage')->nullable();
            $table->string('stock_balance')->nullable();
            $table->longText('supplier_info')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
