<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrugEditorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drug_editors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('drug_id')->unsigned();
            $table->unsignedInteger('editor_id');
            $table->foreign('drug_id')->references('id')->on('drugs')->onDelete('cascade');
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
        Schema::table('drug_editors', function (Blueprint $table) {
            $table->dropForeign('drug_editors_drug_id_foreign');
            $table->dropForeign('drug_editors_editor_id_foreign');
        });
        Schema::dropIfExists('drug_editors');
    }
}
