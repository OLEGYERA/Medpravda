<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCosmeticEditorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cosmetic_editors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('cosmetic_id')->unsigned();
            $table->unsignedInteger('editor_id');
            $table->foreign('cosmetic_id')->references('id')->on('cosmetic_news')->onDelete('cascade');
            $table->foreign('editor_id')->references('id')->on('editors');
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
        Schema::table('cosmetic_editors', function (Blueprint $table) {
            $table->dropForeign('cosmetic_editors_cosmetic_id_foreign');
            $table->dropForeign('cosmetic_editors_editor_id_foreign');
        });
        Schema::dropIfExists('cosmetic_editors');
    }
}
