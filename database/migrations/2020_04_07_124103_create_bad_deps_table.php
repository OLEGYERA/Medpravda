<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBadDepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bad_deps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('bad_id')->unsigned();
            $table->bigInteger('pharma_id')->nullable()->unsigned();
            $table->bigInteger('fabricator_id')->nullable()->unsigned();
            $table->bigInteger('fabricator_location_id')->nullable()->unsigned();
            $table->integer('class_id')->nullable()->unsigned();

            $table->foreign('bad_id')->references('id')->on('bad_news');
            $table->foreign('pharma_id')->references('id')->on('dep_bad_pharmas');
            $table->foreign('fabricator_id')->references('id')->on('dep_fabricators');
            $table->foreign('fabricator_location_id')->references('id')->on('dep_fabricator_locations');
            $table->foreign('class_id')->references('id')->on('class_bad');
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
        Schema::table('bad_deps', function (Blueprint $table) {
            $table->dropForeign('bad_deps_bad_id_foreign');
            $table->dropForeign('bad_deps_pharma_id_foreign');
            $table->dropForeign('bad_deps_fabricator_id_foreign');
            $table->dropForeign('bad_deps_fabricator_location_id_foreign');
            $table->dropForeign('bad_deps_class_id_foreign');
        });
        Schema::dropIfExists('bad_deps');
    }
}
