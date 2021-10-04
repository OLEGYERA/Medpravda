<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepFabricatorLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dep_fabricator_locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('utitle');
            $table->text('full_title');
            $table->text('full_utitle');
            $table->string('alias');
            $table->bigInteger('fabricator_id')->unsigned();
            $table->foreign('fabricator_id')->references('id')->on('dep_fabricators');
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
        Schema::table('dep_fabricator_locations', function (Blueprint $table) {
            $table->dropForeign('dep_fabricator_locations_fabricator_id_foreign');
        });
        Schema::dropIfExists('dep_fabricator_locations');
    }
}
