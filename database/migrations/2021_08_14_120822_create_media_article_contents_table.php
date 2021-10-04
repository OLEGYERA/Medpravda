<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class   CreateMediaArticleContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_article_contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('ru')->nullable();
            $table->longText('ua')->nullable();
            $table->bigInteger('media_article_id')->unsigned();
            $table->foreign('media_article_id')->references('id')->on('media_articles');

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
        Schema::table('media_article_contents', function (Blueprint $table) {
            $table->dropForeign('media_article_contents_media_article_id_foreign');
        });
        Schema::dropIfExists('media_article_contents');
    }
}
