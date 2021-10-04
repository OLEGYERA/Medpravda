<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLandingBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landing_banners', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('landing_id');
            $table->foreign('landing_id')->references('id')->on('landings')->onDelete('cascade');

            $table->text('title')->nullable()->default(null);
            $table->text('description')->nullable()->default(null);

            $table->string('image')->nullable()->default(null);
            $table->string('imgalt')->nullable()->default(null);
            $table->string('imgtitle')->nullable()->default(null);
            $table->text('background')->nullable()->default(null);
            $table->text('button')->nullable()->default(null);

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
        Schema::dropIfExists('landing_banners');
    }
}
