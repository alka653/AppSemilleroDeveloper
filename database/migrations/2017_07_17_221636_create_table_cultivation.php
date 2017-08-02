<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCultivation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create table cultivation with their attributes
        Schema::create('cultivation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hectare');
            $table->integer('id_user')->unsigned();
            $table->integer('id_product')->unsigned();
            $table->timestamps();
        });
        //Update table cultivation with their respective relationships
        Schema::table('cultivation', function (Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_product')->references('id')->on('product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Drop the table cultivation if exists
        Schema::dropIfExists('cultivation');
    }
}
