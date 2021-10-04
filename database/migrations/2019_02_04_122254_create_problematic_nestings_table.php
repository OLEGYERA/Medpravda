<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProblematicNestingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('problematic_nesting', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('root_page')->unsigned()->nullable();
            $table->integer('child_page')->unsigned()->nullable();

            $table->foreign('root_page')->references('id')->on('problematic')->onDelete('set null');
            $table->foreign('child_page')->references('id')->on('problematic')->obDelete('set null');


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
        Schema::dropIfExists('problematic_nesting');
    }
}
