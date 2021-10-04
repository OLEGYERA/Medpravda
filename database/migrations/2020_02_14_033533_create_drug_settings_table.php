<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrugSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drug_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('fix')->default(false);
            $table->boolean('registration_life')->default(true);
            $table->boolean('recipe')->default(false);
            $table->boolean('review')->default(true);
            $table->boolean('adverising')->default(false);
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
        Schema::dropIfExists('drug_settings');
    }
}
