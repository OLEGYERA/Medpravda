<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLongreadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('longreads', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('longread_template_id');
            $table->string('title')->index();
            $table->string('utitle')->index();
            $table->string('alias')->unique();
            $table->integer('priority')->default(0);
            $table->boolean('approved')->index()->default(false)->index();
            $table->boolean('uapproved')->index()->default(false)->index();
            $table->mediumText('description')->nullable()->default(null);
            $table->mediumText('udescription')->nullable()->default(null);
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
        Schema::dropIfExists('longreads');
    }
}
