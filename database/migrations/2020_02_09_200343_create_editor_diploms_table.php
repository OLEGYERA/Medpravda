<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEditorDiplomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('editor_diploms', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('editor_id');
            $table->foreign('editor_id')->references('id')->on('editors');
            $table->unsignedInteger('diplom_id');
            $table->foreign('diplom_id')->references('id')->on('galleries');
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
        Schema::table('editor_diploms', function (Blueprint $table) {
            $table->dropForeign('editor_diploms_editor_id_foreign');
            $table->dropForeign('editor_diploms_diplom_id_foreign');
        });

        Schema::dropIfExists('editor_diploms');
    }
}
