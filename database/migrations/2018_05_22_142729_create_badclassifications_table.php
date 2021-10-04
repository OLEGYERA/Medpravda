<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBadclassificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('badclassifications', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('uname');
            $table->string('class');

            $table->unsignedInteger('parent')->nullable()->default(null);
            $table->foreign('parent')->references('id')->on('badclassifications');

            $table->text('seo')->nullable()->default(null);
            $table->text('uaseo')->nullable()->default(null);
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
        Schema::dropIfExists('badclassifications');
    }
}
