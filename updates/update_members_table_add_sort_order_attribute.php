<?php namespace Codecycler\Team\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * UpdateMembersTableAddSortOrderAttribute Migration
 */
class UpdateMembersTableAddSortOrderAttribute extends Migration
{
    public function up()
    {
        Schema::table('codecycler_team_members', function (Blueprint $table) {
            $table->integer('sort_order')->nullable();
        });
    }

    public function down()
    {
        Schema::table('codecycler_team_members', function (Blueprint $table) {
            $table->dropColumn('sort_order');
        });
    }
}
