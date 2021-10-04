<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBadLabelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bad_labels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('bad_id')->unsigned();
            $table->string('title');
            $table->string('utitle');
            $table->foreign('bad_id')->references('id')->on('bad_news');
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
        Schema::table('bad_labels', function (Blueprint $table) {
            $table->dropForeign('bad_labels_bad_id_foreign');
        });
        Schema::dropIfExists('bad_labels');
    }
}
