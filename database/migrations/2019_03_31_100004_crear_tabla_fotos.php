<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaFotos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fotos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contacto_id')->unsigned();
            $table->string('foto');
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
        Schema::table('fotos', function (Blueprint $table) {
            $table->dropForeign('contacto_id');
        });

        Schema::dropIfExists('fotos');
    }
}
