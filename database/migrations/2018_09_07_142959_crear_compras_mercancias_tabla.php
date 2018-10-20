<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearComprasMercanciasTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras_mercancias', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->string('anio',4);
            $table->string('mes',2);
            $table->string('dia',2);
            $table->string('observacion',100);
            $table->integer('proveedor_id')->unsigned();

            $table->foreign('proveedor_id')->references('id')->on('proveedores');
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
        Schema::dropIfExists('compras_mercancias');
    }
}
