<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditMediaArticleDepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('media_article_deps', function (Blueprint $table) {
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->bigInteger('structure_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('media_categories');
            $table->foreign('structure_id')->references('id')->on('media_structures');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('media_article_deps', function (Blueprint $table) {
            $table->dropForeign('media_article_deps_category_id_foreign');
            $table->dropForeign('media_article_deps_structure_id_foreign');
            $table->dropColumn('category_id');
            $table->dropColumn('structure_id');
        });
    }
}
