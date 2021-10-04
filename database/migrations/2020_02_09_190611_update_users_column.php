<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('surname')->nullable();
            $table->string('country')->default('Украина');
            $table->string('city')->default('Киев');
            $table->unsignedInteger('rule_id')->default(1)->nullable();;
            $table->unsignedInteger('avatar_id')->default(1)->nullable();;
            $table->foreign('rule_id')->references('id')->on('manage_rules');
            $table->foreign('avatar_id')->references('id')->on('galleries');
            $table->boolean('aside')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_rule_id_foreign');
            $table->dropForeign('users_avatar_id_foreign');
            $table->dropColumn(array('name', 'middle_name', 'surname', 'country', 'city', 'rule_id', 'avatar_id', 'aside'));
        });
    }
}
