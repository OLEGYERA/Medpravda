<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManageRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manage_rules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->index();
            $table->string('alias')->unique();
            $table->boolean('administration')->default(0);
                $table->tinyInteger('managers')->default(1);;
                $table->tinyInteger('users')->default(1);
                $table->tinyInteger('rules')->default(1);
            $table->boolean('moderation')->default(1);
                $table->tinyInteger('reviews')->default(1);
            $table->boolean('catalog')->default(1);
                $table->tinyInteger('drug')->default(1);
            $table->boolean('dependency')->default(1);
            $table->boolean('history')->default(0);
                $table->tinyInteger('backup')->default(1);
            $table->boolean('gallery')->default(1);
                $table->tinyInteger('modal')->default(1);
            $table->boolean('protection')->default(0);
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
        Schema::dropIfExists('manage_rules');
    }
}
