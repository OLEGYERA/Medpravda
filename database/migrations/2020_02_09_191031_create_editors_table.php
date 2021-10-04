<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEditorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('editors', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('active')->default(false);
            $table->string('specialty')->nullable();
            $table->string('specialization')->nullable();
            $table->unsignedInteger('rank_id')->default(1);
            $table->unsignedInteger('user_id')->unique();
            $table->foreign('rank_id')->references('id')->on('editor_ranks');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedSmallInteger('experience')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
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
        Schema::table('editors', function (Blueprint $table) {
            $table->dropForeign('editors_rank_id_foreign');
        });
        Schema::dropIfExists('editors');
    }
}
