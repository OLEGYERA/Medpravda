<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIdeasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ideas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');

            $table->string('slug')->unique();
            $table->string('url')->index();

            $table->string('utm_source')->nullable()->default(null);
            $table->string('utm_medium')->nullable()->default(null);
            $table->string('utm_campaign')->nullable()->default(null);
            $table->string('utm_content')->nullable()->default(null);

            $table->unsignedSmallInteger('transition');
            $table->unsignedSmallInteger('clicked')->default(0);
            $table->unsignedSmallInteger('banner_click')->default(0);

            $table->timestamp('start')->nullable()->index();
            $table->timestamp('stop')->index();

            $table->string('filename')->nullable()->default(null);
            $table->string('href_id')->nullable()->default(null);

            $table->boolean('approved')->index()->nullable()->default(0);
            $table->boolean('stoped')->index()->nullable()->default(0);
            $table->boolean('banner')->nullable()->default(0);

            $table->unsignedSmallInteger('click_ratio')->default(0)->index();
            $table->unsignedSmallInteger('banner_ratio')->default(0)->index();

            $table->unsignedInteger('scenario_id')->nullable()->default(null);
            $table->foreign('scenario_id')->references('id')->on('scenarios')->onDelete('set null');

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
        Schema::dropIfExists('ideas');
    }
}