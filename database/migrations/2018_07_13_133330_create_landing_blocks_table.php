<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLandingBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landing_blocks', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('landing_id');
            $table->foreign('landing_id')->references('id')->on('landings')->onDelete('cascade');

            $table->string('title');

            $table->boolean('approved')->default(0);
            $table->boolean('banner')->default(0);

            $table->unsignedTinyInteger('position')->default(1);
            $table->unsignedTinyInteger('source')->default(1);

            $table->text('button1')->nullable()->default(null);
            $table->text('button2')->nullable()->default(null);

            $table->text('title1')->nullable()->default(null);
            $table->text('title2')->nullable()->default(null);
            $table->text('title3')->nullable()->default(null);

            $table->text('description1')->nullable()->default(null);
            $table->text('description2')->nullable()->default(null);


            $table->text('boolpoint')->nullable()->default(null);
            $table->text('background')->nullable()->default(null);

            $table->text('image')->nullable()->default(null);
            $table->text('video')->nullable()->default(null);
            $table->text('slides')->nullable()->default(null);
            $table->text('script')->nullable()->default(null);

            $table->text('custom')->nullable()->default(null);

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
        Schema::dropIfExists('landing_blocks');
    }
}
