<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLockedByColumnInTableDownloads extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('downloads', function ($table) {
            $table->boolean('locked');
            $table->integer('locked_by')->unsigned();
            $table->string('re_pages');
            $table->string('paper_pages');
            $table->string('glossy_pages');
            $table->string('classifieds_pages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('downloads', function ($table) {
            $table->dropColumn('locked');
            $table->dropColumn('locked_by');
            $table->dropColumn('re_pages');
            $table->dropColumn('paper_pages');
            $table->dropColumn('glossy_pages');
            $table->dropColumn('classifieds_pages');
        });

    }
}
