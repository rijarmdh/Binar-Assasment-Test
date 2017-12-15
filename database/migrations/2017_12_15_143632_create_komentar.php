<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKomentar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komentars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('body');
            $table->integer('id_user')->unsigned();
            $table->integer('id_tutorial')->unsigned();
            //

            $table->foreign('id_user')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('id_tutorial')->references('id')->on('tutorials')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('komentars');
    }
}
