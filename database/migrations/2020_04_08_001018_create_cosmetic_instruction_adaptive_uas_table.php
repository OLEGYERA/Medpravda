<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCosmeticInstructionAdaptiveUasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cosmetic_instruction_adaptive_uas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('cosmetic_id')->unsigned();
            $table->foreign('cosmetic_id')->references('id')->on('cosmetic_news');
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
        Schema::table('cosmetic_instruction_adaptive_uas', function (Blueprint $table) {
            $table->dropForeign('cosmetic_instruction_adaptive_uas_cosmetic_id_foreign');
        });
        Schema::dropIfExists('cosmetic_instruction_adaptive_uas');
    }
}
