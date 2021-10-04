<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaStructureBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_structure_blocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('utitle');
            $table->boolean('required')->default(null);
            $table->bigInteger('media_structure_id')->unsigned();
            $table->foreign('media_structure_id')->references('id')->on('media_structures');
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
        Schema::table('media_structure_blocks', function (Blueprint $table) {
            $table->dropForeign('media_structure_blocks_media_structure_id_foreign');
        });
        Schema::dropIfExists('media_structure_blocks');
    }
}
