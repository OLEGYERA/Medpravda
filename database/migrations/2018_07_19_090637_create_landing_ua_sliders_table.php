<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLandingUaSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landing_ua_sliders', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('landing_ua_block_id');
            $table->foreign('landing_ua_block_id')->references('id')->on('landing_ua_blocks')->onDelete('cascade');

            $table->string('alt')->nullable()->default(null);
            $table->string('title')->nullable()->default(null);
            $table->string('video')->nullable()->default(null);
            $table->string('path')->nullable()->default(null);
            $table->string('color')->nullable()->default(null);

            $table->text('description')->nullable()->default(null);
            $table->unsignedTinyInteger('position')->default(1);

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
        Schema::dropIfExists('landing_ua_sliders');
    }
}