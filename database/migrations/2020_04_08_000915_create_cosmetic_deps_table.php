<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCosmeticDepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cosmetic_deps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('cosmetic_id')->unsigned();
            $table->bigInteger('fabricator_id')->nullable()->unsigned();
            $table->bigInteger('fabricator_location_id')->nullable()->unsigned();
            $table->integer('class_id')->nullable()->unsigned();

            $table->foreign('cosmetic_id')->references('id')->on('cosmetic_news');
            $table->foreign('fabricator_id')->references('id')->on('dep_fabricators');
            $table->foreign('fabricator_location_id')->references('id')->on('dep_fabricator_locations');
            $table->foreign('class_id')->references('id')->on('class_cosmetics');
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
        Schema::table('cosmetic_deps', function (Blueprint $table) {
            $table->dropForeign('cosmetic_deps_cosmetic_id_foreign');
            $table->dropForeign('cosmetic_deps_fabricator_id_foreign');
            $table->dropForeign('cosmetic_deps_fabricator_location_id_foreign');
            $table->dropForeign('cosmetic_deps_class_id_foreign');
        });
        Schema::dropIfExists('cosmetic_deps');
    }
}
