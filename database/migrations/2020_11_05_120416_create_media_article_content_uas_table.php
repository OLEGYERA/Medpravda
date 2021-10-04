<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaArticleContentUasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_article_content_uas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->MediumText('definition')->nullable();
            $table->MediumText('occurrence')->nullable();
            $table->MediumText('symptoms')->nullable();
            $table->MediumText('diagnostics')->nullable();
            $table->MediumText('development_stages')->nullable();
            $table->MediumText('doctor')->nullable();
            $table->MediumText('treat')->nullable();
            $table->MediumText('diet')->nullable();
            $table->MediumText('remedies')->nullable();
            $table->MediumText('complications')->nullable();
            $table->MediumText('children')->nullable();
            $table->MediumText('pregnant_lactating')->nullable();
            $table->MediumText('people')->nullable();
            $table->MediumText('spread')->nullable();
            $table->MediumText('prevention')->nullable();
            $table->MediumText('vaccination')->nullable();
            $table->MediumText('provisions')->nullable();
            $table->MediumText('sources')->nullable();
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
        Schema::table('media_article_content_uas', function (Blueprint $table) {
            $table->dropForeign('media_article_content_uas_id_foreign');
        });
        Schema::dropIfExists('media_article_content_uas');
    }
}
