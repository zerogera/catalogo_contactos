<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaDirecciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contacto_id')->unsigned();
            $table->string('direccion');
            $table->foreign('contacto_id')->references('id')->on('contactos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('direciones', function (Blueprint $table) {
            $table->dropForeign('contacto_id');
        });

        Schema::dropIfExists('direciones');
    }
}
