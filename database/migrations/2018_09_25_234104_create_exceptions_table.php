<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExceptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exceptions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('exception_type');
            $table->date('date_from');
            $table->date('date_to');
            $table->string('description');
            $table->time('time_from')->nullable();
            $table->time('time_to')->nullable();
            $table->boolean('paid');
            $table->integer('approver_id')->unsigned();
            $table->integer('user_id')->unsigned();
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
        Schema::drop('exceptions');
    }
}
