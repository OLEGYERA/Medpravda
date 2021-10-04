<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrugLabelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drug_labels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('drug_id')->unsigned();
            $table->string('title');
            $table->string('utitle');
            $table->foreign('drug_id')->references('id')->on('drugs');
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
        Schema::table('drug_labels', function (Blueprint $table) {
            $table->dropForeign('drug_labels_drug_id_foreign');
        });
        Schema::dropIfExists('drug_labels');
    }
}
