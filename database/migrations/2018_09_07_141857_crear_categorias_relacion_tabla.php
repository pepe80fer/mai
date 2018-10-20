<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearCategoriasRelacionTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria_categoria_global', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categoria_global_id')->unsigned();
            $table->integer('categoria_id')->unsigned();

            $table->foreign('categoria_global_id')->references('id')->on('categorias_globales');
            $table->foreign('categoria_id')->references('id')->on('categorias');

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
        Schema::dropIfExists('categoria_categoria_global');
    }
}
