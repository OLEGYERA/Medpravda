<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWareQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ware_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->foreign('slug')->references('slug')->on('wares')->onUpdate('cascade')->onDelete('cascade');

            $table->text('ru')->nullable()->default(null);
            $table->text('ua')->nullable()->default(null);
            
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
        Schema::dropIfExists('ware_questions');
    }
}
