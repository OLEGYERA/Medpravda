<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bads', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title')->index();
            $table->string('slug')->unique();

            $table->unsignedInteger('fabricator_id')->nullable()->defaul(null);
            $table->foreign('fabricator_id')->references('id')->on('fabricators')->onDelete('set null');

            $table->unsignedInteger('classification_id')->nullable()->defaul(null);
            $table->foreign('classification_id')->references('id')->on('badclassifications')->onDelete('set null');

            $table->boolean('approved')->index()->default(false)->index();
            $table->boolean('certified')->index()->default(false)->index();
            $table->unsignedInteger('view')->default(0)->index();

            $table->string('dose')->nullable()->default(null);
            $table->string('reg')->nullable()->default(null);
            $table->string('backcolor', 6)->nullable()->default(null);


            $table->text('seo')->nullable()->default(null);
//      Content
            $table->text('consist')->nullable()->default(null);
            $table->text('pharm_group')->nullable()->default(null);
            $table->text('pharm_prop')->nullable()->default(null);
            $table->text('recommendations')->nullable()->default(null);
            $table->text('special_instructions')->nullable()->default(null);
            $table->text('contraindications')->nullable()->default(null);
            $table->text('app_mode')->nullable()->default(null);
            $table->text('saving')->nullable()->default(null);
            $table->text('packaging')->nullable()->default(null);
            $table->text('fabricator_name')->nullable()->default(null);
            $table->text('additionally')->nullable()->default(null);
//      Content

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
        Schema::dropIfExists('bads');
    }
}
