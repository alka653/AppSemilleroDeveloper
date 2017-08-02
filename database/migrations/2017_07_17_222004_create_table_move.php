<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMove extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create table move with their attributes
        Schema::create('move', function (Blueprint $table) {
            $table->increments('id');
            $table->string('detail',100);
            $table->float('price',11,2);
            $table->enum('type_of_move', ['G','C']);
            $table->integer('id_cultivation')->unsigned();
            $table->integer('id_service')->unsigned();
            $table->timestamps();
        });
        //Update table move with their respective relationships
        Schema::table('move', function (Blueprint $table) {
            $table->foreign('id_cultivation')->references('id')->on('cultivation');
            $table->foreign('id_service')->references('id')->on('service');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Drop the table move if exists
        Schema::dropIfExists('move');
    }
}
