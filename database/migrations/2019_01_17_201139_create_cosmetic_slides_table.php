<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCosmeticSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cosmetic_slides', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('cosmetic_id');
            $table->string('path')->nullable()->default(null);
            $table->string('alt')->nullable()->default(null);
            $table->string('title')->nullable()->default(null);

            $table->foreign('cosmetic_id')->references('id')->on('cosmetics')->onDelete('cascade');

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
        Schema::dropIfExists('cosmetic_slides');
    }
}
