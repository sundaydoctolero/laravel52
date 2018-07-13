<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outputs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('download_id')->unsigned()->index();
            $table->integer('sale_records');
            $table->integer('rent_records');
            $table->integer('sequence_from');
            $table->integer('sequence_to');
            $table->date('output_date');
            $table->string('delivery_time');
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
        Schema::drop('outputs');
    }
}
