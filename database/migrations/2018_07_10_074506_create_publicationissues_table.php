<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicationIssuesTable extends Migration
{
    /**
     * Run the migrations.php art
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publication_issues', function (Blueprint $table) {
            $table->increments('id');
            $table->string('issue_name');
            $table->string('issue_description');
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
        Schema::drop('publication_issues');
    }
}
