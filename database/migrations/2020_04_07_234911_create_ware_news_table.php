<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWareNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ware_news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('utitle');
            $table->string('alias')->unique();
            $table->string('dosage')->nullable();
            $table->string('udosage')->nullable();
            $table->string('registration')->nullable();
            $table->string('uregistration')->nullable();
            $table->unsignedInteger('image_id')->default(1);
            $table->bigInteger('setting_id')->unsigned();
            $table->unsignedInteger('creator_id');
            $table->foreign('image_id')->references('id')->on('galleries');
            $table->foreign('setting_id')->references('id')->on('ware_settings')->onDelete('cascade');
            $table->foreign('creator_id')->references('id')->on('users');
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
        Schema::table('ware_news', function (Blueprint $table) {
            $table->dropForeign('ware_news_image_id_foreign');
            $table->dropForeign('ware_news_setting_id_foreign');
            $table->dropForeign('ware_news_creator_id_foreign');
        });
        Schema::dropIfExists('ware_news');
    }
}
