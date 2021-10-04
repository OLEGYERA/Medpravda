<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWareDepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ware_deps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('ware_id')->unsigned();
            $table->bigInteger('fabricator_id')->nullable()->unsigned();
            $table->bigInteger('fabricator_location_id')->nullable()->unsigned();
            $table->integer('class_id')->nullable()->unsigned();

            $table->foreign('ware_id')->references('id')->on('ware_news');
            $table->foreign('fabricator_id')->references('id')->on('dep_fabricators');
            $table->foreign('fabricator_location_id')->references('id')->on('dep_fabricator_locations');
            $table->foreign('class_id')->references('id')->on('class_wares');
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
        Schema::table('ware_deps', function (Blueprint $table) {
            $table->dropForeign('ware_deps_ware_id_foreign');
            $table->dropForeign('ware_deps_fabricator_id_foreign');
            $table->dropForeign('ware_deps_fabricator_location_id_foreign');
            $table->dropForeign('ware_deps_class_id_foreign');
        });
        Schema::dropIfExists('ware_deps');
    }
}
