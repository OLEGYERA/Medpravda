<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaStructureSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_structure_settings', function (Blueprint $table) {
            $table->bigIncrements('id');


            $table->boolean('fullWidth')->default(false);
            $table->boolean('bgTop')->default(false);
            $table->boolean('float')->default(false);

            $table->bigInteger('media_structure_id')->unsigned();
            $table->foreign('media_structure_id')->references('id')->on('media_structures');

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
        Schema::table('media_structure_settings', function (Blueprint $table) {
            $table->dropForeign('media_structure_settings_media_structure_id_foreign');
        });
        Schema::dropIfExists('media_structure_settings');
    }
}
