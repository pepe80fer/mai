<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearFacturasFormasPagosTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas_formas_pagos', function (Blueprint $table) {
            $table->increments('id');
            $table->binary('finalizado');
            $table->integer('factura_id')->unsigned();
            $table->integer('forma_pago_id')->unsigned();

            $table->foreign('factura_id')->references('id')->on('facturas');
            $table->foreign('forma_pago_id')->references('id')->on('formas_pagos');
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
        Schema::dropIfExists('facturas_formas_pagos');
    }
}
