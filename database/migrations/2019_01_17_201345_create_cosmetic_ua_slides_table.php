<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCosmeticUaSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cosmetic_ua_slides', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('cosmetic_ua_id');
            $table->string('path')->nullable()->default(null);
            $table->string('alt')->nullable()->default(null);
            $table->string('title')->nullable()->default(null);

            $table->foreign('cosmetic_ua_id')->references('id')->on('cosmetic_uas')->onDelete('cascade');

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
        Schema::dropIfExists('cosmetic_ua_slides');
    }
}
