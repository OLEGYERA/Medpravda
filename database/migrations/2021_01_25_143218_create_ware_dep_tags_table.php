<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWareDepTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ware_dep_tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('ware_dep_id')->unsigned();
            $table->bigInteger('tag_id')->unsigned();
            $table->foreign('ware_dep_id')->references('id')->on('ware_deps');
            $table->foreign('tag_id')->references('id')->on('dep_tags');
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
        Schema::table('ware_dep_tags', function (Blueprint $table) {
            $table->dropForeign('ware_dep_tags_ware_dep_id_foreign');
            $table->dropForeign('ware_dep_tags_tag_id_foreign');
        });
        Schema::dropIfExists('ware_dep_tags');
    }
}
