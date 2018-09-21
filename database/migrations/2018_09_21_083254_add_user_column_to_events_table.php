<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserColumnToEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function ($table) {
            $table->integer('user_id')->unsigned();
            $table->string('description');
            $table->timestamp('sdate');
            $table->timestamp('edate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function ($table) {
            $table->dropColumn('user_id');
            $table->dropColumn('description');
            $table->dropColumn('sdate');
            $table->dropColumn('edate');
        });
    }
}
