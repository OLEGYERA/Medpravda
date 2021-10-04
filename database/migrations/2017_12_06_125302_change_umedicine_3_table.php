<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeUmedicine3Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('ALTER TABLE umedicines ADD FULLTEXT search(
            consist, physicochemical_char, pharm_group, additionally,
             indications, pharm_prop, contraindications, security, application_features, pregnancy, cars, children,
              app_mode, overdose, side_effects, interaction
            )');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('umedicines', function ($table) {
            $table->dropIndex('search');
        });
    }
}