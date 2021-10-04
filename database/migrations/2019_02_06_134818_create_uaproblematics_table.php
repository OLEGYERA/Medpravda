<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUaproblematicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uaproblematic', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->index();
            $table->string('alias')->unique();
            $table->boolean('approved')->index()->default(false)->index();
            $table->mediumText('content')->nullable()->default(null);
            $table->text('seo')->nullable()->default(null);
            $table->boolean('root_page')->default(false);
            $table->integer('ru_problematic')->unsigned()->nullable();
            $table->foreign('ru_problematic')->references('id')->on('problematic')->onDelete('set null');
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
        Schema::dropIfExists('uaproblematic');
    }
}
