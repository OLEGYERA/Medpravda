<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaArticleDepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_article_deps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('image_id')->nullable();
            $table->unsignedInteger('editor_id');
            $table->timestamps();

            $table->foreign('id')->references('id')->on('media_articles');
            $table->foreign('image_id')->references('id')->on('galleries');
            $table->foreign('editor_id')->references('id')->on('users');

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
            $table->dropForeign('media_article_deps_id_foreign');
            $table->dropForeign('media_article_deps_image_id_foreign');
            $table->dropForeign('media_article_deps_editor_id_foreign');
        });
        Schema::dropIfExists('media_article_deps');
    }
}
