<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWareInstructionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ware_instructions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('ware_id')->unsigned();
            $table->foreign('ware_id')->references('id')->on('ware_news');
            $table->MediumText('composition')->nullable();
            $table->MediumText('pharma_props')->nullable();
            $table->MediumText('indications')->nullable();
            $table->MediumText('special_indications')->nullable();
            $table->MediumText('contraindications')->nullable();
            $table->MediumText('usage_and_dose')->nullable();
            $table->MediumText('release_form')->nullable();
            $table->MediumText('storage_conditions')->nullable();
            $table->MediumText('other')->nullable();
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
        Schema::table('ware_instructions', function (Blueprint $table) {
            $table->dropForeign('ware_instructions_ware_id_foreign');
        });
        Schema::dropIfExists('ware_instructions');
    }
}
