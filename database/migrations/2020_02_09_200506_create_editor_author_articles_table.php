<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEditorAuthorArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('editor_author_articles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('editor_id');
            $table->foreign('editor_id')->references('id')->on('editors');
            $table->string('href');
            $table->string('name');
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
        Schema::dropIfExists('editor_author_articles');
    }
}
