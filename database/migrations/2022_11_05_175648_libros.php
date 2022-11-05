<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Libros extends Migration
{
    public function up()
    {
        //
        Schema::create('libros', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->bigIncrements('id')->index()->unsigned();

            $table->bigInteger('categoria_id')->unsigned();

            $table->string('nombre');


            $table->foreign("categoria_id")->references("id")->on("categorias")->onDelete("cascade");

            $table->foreign("id")->references("libro_id")->on("reservas")->onDelete("cascade");

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
        //
        Schema::dropIfExists('libros');
    }
}
