<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLongreadBuildersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('longread_builders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('longreads_id');
            $table->unsignedInteger('longread_template_part_id');
            $table->text('content')->nullable()->default(null);
            $table->string('img')->nullable()->default(null);
            $table->string('title')->nullable()->default(null);
            $table->string('alt')->nullable()->default(null);
            $table->string('lang')->nullable()->default('ru');
            $table->timestamps();

            $table->foreign('longreads_id')->references('id')->on('longreads')->onDelete('cascade');
            $table->foreign('longread_template_part_id')->references('id')->on('longread_template_parts')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('longread_builders');

    }
}
