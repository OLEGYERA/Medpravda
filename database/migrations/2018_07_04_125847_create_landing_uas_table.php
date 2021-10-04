<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLandingUasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landing_uas', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('landing_id');
            $table->foreign('landing_id')->references('id')->on('landings')->onDelete('cascade');

            $table->string('title');
            $table->string('slug')->unique();

            $table->boolean('approved')->default(0);
            $table->boolean('modal')->default(0);

            $table->unsignedTinyInteger('font_family')->default(1);

            $table->text('logo')->nullable()->default(null);
            $table->text('boolpoint')->nullable()->default(null);
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
        Schema::dropIfExists('landing_uas');
    }
}
