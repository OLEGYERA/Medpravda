<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaArticleContentBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_article_content_blocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('ru')->nullable();
            $table->longText('ua')->nullable();

            $table->bigInteger('block_id')->unsigned()->nullable();
            $table->bigInteger('article_id')->unsigned()->nullable();
            $table->foreign('block_id')->references('id')->on('media_structure_blocks');
            $table->foreign('article_id')->references('id')->on('media_articles');
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
        Schema::table('media_article_content_blocks', function (Blueprint $table) {
            $table->dropForeign('media_article_content_blocks_block_id_foreign');
            $table->dropForeign('media_article_content_blocks_article_id_foreign');
        });
        Schema::dropIfExists('media_article_content_blocks');
    }
}
