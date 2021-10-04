<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCosmeticDepTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cosmetic_dep_tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('cosmetic_dep_id')->unsigned();
            $table->bigInteger('tag_id')->unsigned();
            $table->foreign('cosmetic_dep_id')->references('id')->on('cosmetic_deps');
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
        Schema::table('cosmetic_dep_tags', function (Blueprint $table) {
            $table->dropForeign('cosmetic_dep_tags_cosmetic_dep_id_foreign');
            $table->dropForeign('cosmetic_dep_tags_tag_id_foreign');
        });
        Schema::dropIfExists('cosmetic_dep_tags');
    }
}
