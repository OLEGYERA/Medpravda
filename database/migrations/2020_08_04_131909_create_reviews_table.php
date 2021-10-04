<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fn');
            $table->string('ln');
            $table->string('email');
            $table->string('gid');
            $table->string('avatar_path');
            $table->tinyInteger('quality');
            $table->tinyInteger('packaging');
            $table->tinyInteger('effect');
            $table->tinyInteger('safety');
            $table->tinyInteger('availability');
            $table->text('worth')->nullable();
            $table->text('limitations')->nullable();
            $table->longText('review')->nullable();
            $table->bigInteger('drug_id')->unsigned();
            $table->foreign('drug_id')->references('id')->on('drugs');
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
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropForeign('reviews_drug_id_foreign');
        });
        Schema::dropIfExists('reviews');
    }
}
