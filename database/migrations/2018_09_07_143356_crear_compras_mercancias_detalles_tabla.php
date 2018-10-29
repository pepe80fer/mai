<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearComprasMercanciasDetallesTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras_mercancias_detalles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidad');
            $table->float('costo_unidad', 11, 2);
            $table->float('costo_total', 11, 2);
            $table->string('observacion',100);
            $table->integer('compra_mercancia_id')->unsigned();

            $table->foreign('compra_mercancia_id')->references('id')->on('compras_mercancias');
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
        Schema::dropIfExists('compras_mercancias_detalles');
    }
}
