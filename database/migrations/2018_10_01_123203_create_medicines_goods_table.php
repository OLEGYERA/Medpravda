<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicinesGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines_goods', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('medicines_id')->nullable();
            $table->foreign('medicines_id')->references('id')->on('medicines')->onDelete('cascade');
            $table->unsignedInteger('goods_id')->nullable();
            $table->foreign('goods_id')->references('id')->on('goods')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicines_goods');
    }
}
