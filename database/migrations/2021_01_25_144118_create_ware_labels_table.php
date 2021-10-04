<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWareLabelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ware_labels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('ware_id')->unsigned();
            $table->string('title');
            $table->string('utitle');
            $table->foreign('ware_id')->references('id')->on('ware_news');
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
        Schema::table('ware_labels', function (Blueprint $table) {
            $table->dropForeign('ware_labels_ware_id_foreign');
        });
        Schema::dropIfExists('ware_labels');
    }
}
