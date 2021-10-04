<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLongreadTemplatePartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('longread_template_parts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('priority')->default(0);
            $table->unsignedInteger('longread_template_id');
            $table->string('type');
            $table->foreign('longread_template_id')->references('id')->on('longread_templates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::table('longread_template_parts', function (Blueprint $table) {
//            $table->dropForeign('longread_template_id');
//        });
        Schema::dropIfExists('longread_template_parts');
    }
}
