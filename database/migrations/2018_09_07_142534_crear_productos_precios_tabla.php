<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearProductosPreciosTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos_precios', function (Blueprint $table) {
            $table->increments('id');
            $table->float('precio', 11, 2);
            $table->float('precio_anterior', 11, 2);
            $table->binary('estado');
            $table->integer('producto_id')->unsigned();

            $table->foreign('producto_id')->references('id')->on('productos');
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
        Schema::dropIfExists('productos_precios');
    }
}
