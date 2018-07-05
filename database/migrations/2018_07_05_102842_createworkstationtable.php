<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Createworkstationtable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workstations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rack_id');
            $table->string('ip_address');
            $table->string('workstation_id');
            $table->string('table');
            $table->string('location');
            $table->string('operator');
            $table->string('comp_name');
            $table->string('mac_address');
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
        Schema::drop('workstations');
    }
}
