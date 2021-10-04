<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWareClassificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ware_classifications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('uname');
            $table->string('class');

            $table->unsignedInteger('parent')->nullable()->default(null);
            $table->foreign('parent')->references('id')->on('ware_classifications');

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
        Schema::dropIfExists('ware_classifications');
    }
}
