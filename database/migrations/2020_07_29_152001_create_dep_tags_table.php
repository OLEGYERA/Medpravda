<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dep_tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('utitle');
            $table->string('alias')->unique();
            $table->longText('term')->nullable();
            $table->longText('uterm')->nullable();
            $table->timestamps();
        });

        Schema::create('drug_dep_tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('drug_dep_id')->unsigned();
            $table->bigInteger('tag_id')->unsigned();
            $table->foreign('drug_dep_id')->references('id')->on('drug_deps');
            $table->foreign('tag_id')->references('id')->on('dep_tags');
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
        Schema::dropIfExists('dep_tags');
        Schema::table('drug_dep_tags', function (Blueprint $table) {
            $table->dropForeign('drug_dep_tags_drug_dep_id_foreign');
            $table->dropForeign('drug_dep_tags_tag_id_foreign');
        });
    }
}
