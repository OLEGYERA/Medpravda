<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrugInstructionUasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drug_instruction_uas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('drug_id')->unsigned();
            $table->foreign('drug_id')->references('id')->on('drugs');
            $table->MediumText('composition')->nullable();
            $table->MediumText('physical_chemical')->nullable();
            $table->MediumText('pharma_props')->nullable();
            $table->MediumText('indications')->nullable();
            $table->MediumText('contraindications')->nullable();
            $table->MediumText('features')->nullable();
            $table->MediumText('pregnancy')->nullable();
            $table->MediumText('driver')->nullable();
            $table->MediumText('children')->nullable();
            $table->MediumText('usage_and_dose')->nullable();
            $table->MediumText('overdose')->nullable();
            $table->MediumText('side_effects')->nullable();
            $table->MediumText('interaction')->nullable();
            $table->MediumText('time_life')->nullable();
            $table->MediumText('storage_conditions')->nullable();
            $table->MediumText('release_form')->nullable();
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
        Schema::table('drug_instruction_uas', function (Blueprint $table) {
            $table->dropForeign('drug_instruction_uas_drug_id_foreign');
        });
        Schema::dropIfExists('drug_instruction_uas');
    }
}
