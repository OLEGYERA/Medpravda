<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProducerFkToGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('goods', function (Blueprint $table){
           $table->unsignedInteger('id_producer')->nullable();
           $table->foreign('id_producer')->references('id')->on('producers')->onDelete('cascade');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('goods', function (Blueprint $table){
           $table->dropForeign(['id_producer']);
           $table->dropColumn('id_producer');
        });
    }
}
