<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBadDepTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bad_dep_tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('tag_id')->unsigned();
            $table->bigInteger('bad_dep_id')->unsigned();
            $table->foreign('bad_dep_id')->references('id')->on('bad_deps');
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
        Schema::table('bad_dep_tags', function (Blueprint $table) {
            $table->dropForeign('bad_dep_tags_bad_dep_id_foreign');
            $table->dropForeign('bad_dep_tags_tag_id_foreign');
        });
        Schema::dropIfExists('bad_dep_tags');
    }
}
