<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToBlocks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blocks', function (Blueprint $table) {
            $table->string('first_url')->nullable()->default(null);
            $table->string('second_url')->nullable()->default(null);
            $table->string('third_url')->nullable()->default(null);
            $table->string('fourth_url')->nullable()->default(null);
            $table->string('fifth_url')->nullable()->default(null);
            $table->string('sixth_url')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blocks', function (Blueprint $table) {
            $table->dropColumn('first_url');
            $table->dropColumn('second_url');
            $table->dropColumn('third_url');
            $table->dropColumn('fourth_url');
            $table->dropColumn('fifth_url');
            $table->dropColumn('sixth_url');
        });
    }
}
