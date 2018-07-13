<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogSheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_sheets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('download_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('sale_rent');
            $table->string('batch_id');
            $table->string('operators');
            $table->time('start_time');
            $table->time('end_time');
            $table->time('total_time');
            $table->date('entry_date');
            $table->string('records');
            $table->string('status');
            $table->string('remarks');
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
        Schema::drop('log_sheets');
    }
}
