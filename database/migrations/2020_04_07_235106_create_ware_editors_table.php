<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWareEditorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ware_editors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('ware_id')->unsigned();
            $table->unsignedInteger('editor_id');
            $table->foreign('ware_id')->references('id')->on('ware_news')->onDelete('cascade');
            $table->foreign('editor_id')->references('id')->on('editors');
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
        Schema::table('ware_editors', function (Blueprint $table) {
            $table->dropForeign('ware_editors_ware_id_foreign');
            $table->dropForeign('ware_editors_editor_id_foreign');
        });
        Schema::dropIfExists('ware_editors');
    }
}
