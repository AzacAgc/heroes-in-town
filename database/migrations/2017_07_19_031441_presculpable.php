<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Presculpable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presculpable', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombreAlias', 255)->nullable();
            $table->string('domicilio', 255)->nullable();
            $table->string('descFisica', 255)->nullable();
            $table->string('fotoPc', 255)->nullable();
            $table->integer('denuncias_id')->unsigned();
            $table->foreign('denuncias_id')->references('id')->on('denuncia')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('presculpable');
    }
}
