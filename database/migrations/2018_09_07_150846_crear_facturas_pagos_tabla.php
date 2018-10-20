<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearFacturasPagosTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas_pagos', function (Blueprint $table) {
            $table->increments('id');
            $table->float('valor', 11, 2);
            $table->integer('factura_forma_pago_id')->unsigned();
            $table->integer('caja_id')->unsigned();

            $table->foreign('factura_forma_pago_id')->references('id')->on('facturas_formas_pagos');
            $table->foreign('caja_id')->references('id')->on('cajas');
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
        Schema::dropIfExists('facturas_pagos');
    }
}
