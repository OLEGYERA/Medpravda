<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('path');
            $table->string('alt')->nullable();
            $table->boolean('protection')->default(false);
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('user_id');
            $table->foreign('category_id')->references('id')->on('gallery_categories');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::table('galleries', function (Blueprint $table) {
            $table->dropForeign('galleries_category_id_foreign');
            $table->dropForeign('galleries_user_id_foreign');
        });
        Schema::dropIfExists('galleries');
    }
}
