<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrugDepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drug_deps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('drug_id')->unsigned();
            $table->bigInteger('inname_id')->nullable()->unsigned();
            $table->bigInteger('pharma_id')->nullable()->unsigned();
            $table->bigInteger('form_id')->nullable()->unsigned();
            $table->bigInteger('fabricator_id')->nullable()->unsigned();
            $table->bigInteger('fabricator_location_id')->nullable()->unsigned();
            $table->bigInteger('atx_id')->nullable()->unsigned();

            $table->foreign('drug_id')->references('id')->on('drugs');
            $table->foreign('inname_id')->references('id')->on('dep_innames');
            $table->foreign('pharma_id')->references('id')->on('dep_pharmas');
            $table->foreign('form_id')->references('id')->on('dep_forms');
            $table->foreign('fabricator_id')->references('id')->on('dep_fabricators');
            $table->foreign('fabricator_location_id')->references('id')->on('dep_fabricator_locations');
            $table->foreign('atx_id')->references('id')->on('dep_atxs');
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
        Schema::table('drug_deps', function (Blueprint $table) {
            $table->dropForeign('drug_deps_drug_id_foreign');
            $table->dropForeign('drug_deps_inname_id_foreign');
            $table->dropForeign('drug_deps_pharma_id_foreign');
            $table->dropForeign('drug_deps_form_id_foreign');
            $table->dropForeign('drug_deps_fabricator_id_foreign');
            $table->dropForeign('drug_deps_fabricator_location_id_foreign');
            $table->dropForeign('drug_deps_atx_id_foreign');

        });
        Schema::dropIfExists('drug_deps');
    }
}
