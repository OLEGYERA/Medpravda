<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCosmeticUasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cosmetic_uas', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title')->index();
            $table->string('slug')->unique();
            $table->foreign('slug')->references('slug')->on('cosmetics')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedInteger('view')->default(0)->index();

            $table->string('dose')->nullable()->default(null);
            $table->string('reg')->nullable()->default(null);

            $table->text('seo')->nullable()->default(null);

//      Content
            $table->text('consist')->nullable()->default(null);
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
        Schema::dropIfExists('cosmetic_uas');
    }
}
