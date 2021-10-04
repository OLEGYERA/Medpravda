<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLongreadImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('longread_images', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('longreads_id');
            $table->string('path')->nullable()->default(null);
            $table->string('alt')->nullable()->default(null);
            $table->string('title')->nullable()->default(null);
            $table->string('upath')->nullable()->default(null);
            $table->string('ualt')->nullable()->default(null);
            $table->string('utitle')->nullable()->default(null);

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
        Schema::dropIfExists('longread_images');
    }
}
