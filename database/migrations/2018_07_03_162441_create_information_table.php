<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information', function (Blueprint $table) {
            $table->increments('id');

            $table->enum('loc', ['ru', 'ua'])->index();
            $table->string('description', 24);
            $table->string('button', 24);

            $table->unsignedMediumInteger('nums');
            $table->string('link')->nullable()->default(null);

            $table->string('image');
            $table->string('alt');
            $table->string('title');

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
        Schema::dropIfExists('information');
    }
}
