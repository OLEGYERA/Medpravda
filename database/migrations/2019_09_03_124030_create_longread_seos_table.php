<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLongreadSeosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('longread_seos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('longreads_id');
            $table->string('seo_title')->nullable()->default(null);
            $table->string('useo_title')->nullable()->default(null);
            $table->string('seo_description')->nullable()->default(null);
            $table->string('useo_description')->nullable()->default(null);
            $table->string('og_image')->nullable()->default(null);
            $table->string('uog_image')->nullable()->default(null);
            $table->string('og_title')->nullable()->default(null);
            $table->string('uog_title')->nullable()->default(null);
            $table->string('og_description')->nullable()->default(null);
            $table->string('uog_description')->nullable()->default(null);

            $table->foreign('longreads_id')->references('id')->on('longreads')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('longread_seos');
    }
}
