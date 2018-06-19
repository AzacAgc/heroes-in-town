<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Denuncia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('denuncia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('foto', 255)->nullable();
            $table->string('tipoDenuncia', 255);
            $table->string('contenidoDenuncia', 255);
            $table->dateTime('fechaHora');
            $table->string('ubicacion', 255);
            $table->integer('IdUsuario')->unsigned();
            $table->foreign('IdUsuario')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('denuncia');
    }
}
