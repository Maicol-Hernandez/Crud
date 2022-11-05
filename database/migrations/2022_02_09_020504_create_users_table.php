<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->bigIncrements('id')->index()->unsigned();
            $table->string('name');
            $table->string('email')->unique();
            $table->bigInteger('identificacion')->unique();
            $table->string('photo');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->bigInteger('tipo')->unsigned(); // 1 = agente, 2 = supervisor, 3 = administrador
            $table->bigInteger('id_reserva')->unsigned()->index();
            $table->rememberToken();
            
            $table->foreign("tipo")->references("id")->on("rol_usuarios")->onDelete("cascade");
            
            

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
        Schema::dropIfExists('users');
    }
}
