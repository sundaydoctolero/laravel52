<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPublicationCodeColumnOnPublicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('publications', function ($table) {
            $table->string('publication_code');
            $table->string('download_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('publications', function ($table) {
            $table->dropColumn('publication_code');
            $table->dropColumn('download_type');
        });
    }
}
