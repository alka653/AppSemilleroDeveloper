<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableService extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create table service with their attributes
        Schema::create('service', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',45);
            $table->char('phase',1);
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
        //Drop the table service if exists
        Schema::dropIfExists('service');
    }
}
