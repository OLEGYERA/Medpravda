<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaArticleSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_article_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('show')->default(1);
            $table->boolean('pin')->default(0);
            $table->boolean('comment')->default(1);
            $table->boolean('adv')->default(1);
            $table->timestamps();

            $table->foreign('id')->references('id')->on('media_articles');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('media_article_settings', function (Blueprint $table) {
            $table->dropForeign('media_article_settings_id_foreign');
        });
        Schema::dropIfExists('media_article_settings');
    }
}
