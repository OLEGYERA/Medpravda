<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rest', function (Blueprint $table) {
            $table->increments('id');

            // fk to goods where store in drug_store
            $table->unsignedInteger('good_id')->nullable();
            $table->foreign('good_id')->references('goods_id')->on('goods')->onDelete('cascade');

            // fk to drug_store table
            $table->unsignedInteger('branch_id')->nullable();
            $table->foreign('branch_id')->references('id')->on('drug_stores')->onDelete('cascade');

            $table->string('quantity',255)->nullable();
            $table->string('price',50)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rest');
    }
}
