<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearFacturasDetallesTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas_detalles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('factura_id')->unsigned();
            $table->integer('producto_talla_id')->unsigned();
            $table->integer('cantidad');
            $table->float('costo_unidad', 11, 2);
            $table->float('costo_total', 11, 2);
            $table->float('precio_unidad', 11, 2);
            $table->float('precio_total', 11, 2);
            $table->float('descuento_unidad', 11, 2);
            $table->float('descuento_total', 11, 2);
            $table->float('valor_unidad', 11, 2);
            $table->float('valor_total', 11, 2);
            $table->float('impuestos', 11, 2);
            $table->float('valor_neto', 11, 2);
            $table->float('utilidad_unidad', 11, 2);
            $table->float('utilidad_total', 11, 2);

            $table->foreign('factura_id')->references('id')->on('facturas');
            $table->foreign('producto_talla_id')->references('id')->on('productos_tallas');
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
        Schema::dropIfExists('facturas_detalles');
    }
}
