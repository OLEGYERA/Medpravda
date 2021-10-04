<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBadInstructionUasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bad_instruction_uas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('bad_id')->unsigned();
            $table->foreign('bad_id')->references('id')->on('bad_news');
            $table->MediumText('composition')->nullable();
            $table->MediumText('pharma_props')->nullable();
            $table->MediumText('indications')->nullable();
            $table->MediumText('special_indications')->nullable();
            $table->MediumText('contraindications')->nullable();
            $table->MediumText('usage_and_dose')->nullable();
            $table->MediumText('release_form')->nullable();
            $table->MediumText('storage_conditions')->nullable();
            $table->MediumText('')->nullable();
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
        Schema::table('bad_instruction_uas', function (Blueprint $table) {
            $table->dropForeign('bad_instruction_uas_bad_id_foreign');
        });
        Schema::dropIfExists('bad_instruction_uas');
    }
}
