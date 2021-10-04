<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLandingModalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landing_modals', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('landing_id');
            $table->foreign('landing_id')->references('id')->on('landings')->onDelete('cascade');

            $table->text('button1')->nullable()->default(null);
            $table->text('button2')->nullable()->default(null);

            $table->text('title1')->nullable()->default(null);
            $table->text('title2')->nullable()->default(null);
            $table->text('title3')->nullable()->default(null);

            $table->text('list')->nullable()->default(null);

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
        Schema::dropIfExists('landing_modals');
    }
}
