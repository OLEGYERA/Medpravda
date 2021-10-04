<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProblematicSortedMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('problematic_sorted_menu', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('root_page')->unsigned()->nullable();
            $table->foreign('root_page')->references('id')->on('problematic')->onDelete('CASCADE');

            $table->text('child_pages')->nullable();
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
        Schema::dropIfExists('problematic_sorted_menu');
    }
}
