<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBadEditorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bad_editors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('bad_id')->unsigned();
            $table->unsignedInteger('editor_id');
            $table->foreign('bad_id')->references('id')->on('bad_news')->onDelete('cascade');
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
        Schema::table('bad_editors', function (Blueprint $table) {
            $table->dropForeign('bad_editors_bad_id_foreign');
            $table->dropForeign('bad_editors_editor_id_foreign');
        });
        Schema::dropIfExists('bad_editors');
    }
}
