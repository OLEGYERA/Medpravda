<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCosmeticLabelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cosmetic_labels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('cosmetic_id')->unsigned();
            $table->string('title');
            $table->string('utitle');
            $table->foreign('cosmetic_id')->references('id')->on('cosmetic_news');
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
        Schema::table('cosmetic_labels', function (Blueprint $table) {
            $table->dropForeign('cosmetic_labels_cosmetic_id_foreign');
        });
        Schema::dropIfExists('cosmetic_labels');
    }
}
