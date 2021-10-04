<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Fresh\Medpravda\GalleryCategory;


class CreateGalleryCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index();
            $table->string('alias');
            $table->timestamps();
        });

        $categories = [['name' => 'Вне Категории', 'alias' => 'Vne-Kategorii'], ['name' => 'Аватары', 'alias' => 'Avatari'], ['name' => 'Дипломы', 'alias' => 'Diplomy'], ['name' => 'Препараты', 'alias' => 'Preparaty']];
        foreach ($categories as $category) {
            GalleryCategory::create($category);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gallery_categories');
    }
}
