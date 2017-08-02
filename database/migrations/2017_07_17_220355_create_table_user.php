<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create table users with their attributes
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->integer('cultivation')->default(0);
            $table->integer('profile_id')->unsigned();
            $table->string('password');
            $table->char('identification_document',10);
            $table->rememberToken();
            $table->timestamps();
        });
        //Update table users with their respective relationship
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('profile_id')->references('id')->on('profile');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Drop the table users if exists
        Schema::dropIfExists('users');
    }
}
