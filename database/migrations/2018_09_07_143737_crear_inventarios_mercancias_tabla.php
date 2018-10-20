<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearInventariosMercanciasTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventarios_mercancias', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->string('anio',4);
            $table->string('mes',2);
            $table->float('costo_unidad', 11, 2);
            $table->float('costo_total', 11, 2);
            $table->integer('cantidad_ingresa');
            $table->integer('cantidad_salida');
            $table->integer('cantidad_disponible');
            $table->integer('producto_talla_id')->unsigned();
            $table->integer('compra_mercancia_detalle_id')->unsigned();

            $table->foreign('producto_talla_id')->references('id')->on('productos_tallas');
            $table->foreign('compra_mercancia_detalle_id')->references('id')->on('compras_mercancias_detalles');
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
        Schema::dropIfExists('inventarios_mercancias');
    }
}
