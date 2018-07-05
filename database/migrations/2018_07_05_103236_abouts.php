<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Abouts extends Migration
{

    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('site_name')->unique();
            $table->string('company_name')->unique();
            $table->string('logo');
            $table->string('theme');
            $table->string('website');
            $table->rememberToken();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::drop('abouts');
    }
}
