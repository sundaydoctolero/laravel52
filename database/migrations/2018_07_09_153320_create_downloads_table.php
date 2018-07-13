<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDownloadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('downloads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('publication_id')->unsigned();
            $table->date('publication_date');
            $table->date('dop_on_website');
            $table->date('website_update_at');
            $table->timestamp('time_downloaded');
            $table->text('remarks');
            $table->text('status');
            $table->integer('checked_by')->unsigned();
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
        Schema::drop('downloads');
    }
}
