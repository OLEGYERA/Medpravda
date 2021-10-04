<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepInnamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dep_innames', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->bigInteger('seo_id')->nullable()->unsigned();
            $table->foreign('seo_id')->references('id')->on('dep_seos')->onDelete('cascade');
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
        Schema::table('dep_innames', function (Blueprint $table) {
            $table->dropForeign('dep_innames_seo_id_foreign');
        });
        Schema::dropIfExists('dep_innames');
    }
}
