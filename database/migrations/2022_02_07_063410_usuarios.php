<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Usuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('usuarios', function (Blueprint $table) {
            
            $table->engine="InnoDB";

            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->bigInteger('identificacion')->unsigned()->unique();
            $table->string('photo');
            $table->string('password')->nullable();
            $table->bigInteger('rol_id')->unsigned();
            $table->timestamps();
            $table->foreign('rol_id')->references('id')->on('rol_usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
