<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrugDepSubstancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drug_dep_substances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('drug_dep_id')->unsigned();
            $table->bigInteger('substance_id')->unsigned();
            $table->foreign('drug_dep_id')->references('id')->on('drug_deps');
            $table->foreign('substance_id')->references('id')->on('dep_substances');
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
        Schema::table('drug_dep_substances', function (Blueprint $table) {
            $table->dropForeign('drug_dep_substances_drug_dep_id_foreign');
            $table->dropForeign('drug_dep_substances_substance_id_foreign');
        });
        Schema::dropIfExists('drug_dep_substances');
    }
}
