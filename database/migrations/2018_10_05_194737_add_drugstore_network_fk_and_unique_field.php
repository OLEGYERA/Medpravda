<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDrugstoreNetworkFkAndUniqueField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('goods', function (Blueprint $table) {
            // add goods_id when parse file
            $table->unsignedInteger('goods_id')->nullable();
            $table->unsignedInteger('network_id')->nullable();
            $table->foreign('network_id')->references('id')->on('drug_store_networks')->onDelete('cascade');
            $table->unique(['goods_id','network_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('goods', function (Blueprint $table) {
            $table->dropForeign(['network_id']);
            $table->dropColumn('goods_id');
            $table->dropColumn('network_id');
        });
    }
}
