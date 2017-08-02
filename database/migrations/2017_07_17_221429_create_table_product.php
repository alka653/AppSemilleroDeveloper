<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create table product with their attributes
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_product',45);
            $table->integer('day_harvest');
            $table->float('price',11,2);
            $table->integer('n_tree');
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
        //Drop the table product if exists
        Schema::dropIfExists('product');
    }
}
