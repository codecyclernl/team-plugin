<?php namespace Codecycler\Team\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateMembersTable Migration
 */
class CreateMembersTable extends Migration
{
    public function up()
    {
        Schema::create('codecycler_team_members', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->text('bio');
            $table->string('role');
            $table->tinyInteger('is_published');

            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('codecycler_team_members');
    }
}
