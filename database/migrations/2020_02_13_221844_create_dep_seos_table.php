<?php

use Fresh\Medpravda\DepSeo;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepSeosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dep_seos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('utitle')->nullable();
            $table->Text('desc')->nullable();
            $table->Text('udesc')->nullable();
            $table->string('ogimage')->nullable();
            $table->string('uogimage')->nullable();
            $table->string('ogtitle')->nullable();
            $table->string('uogtitle')->nullable();
            $table->Text('ogdesc')->nullable();
            $table->Text('uogdesc')->nullable();
            $table->timestamps();
        });

        DepSeo::create([
            'title' => 'Отсутствует',
            'utitle' => 'Відсутній',
        ]);
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dep_seos');
    }
}
