<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearCuentasPagosTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas_pagos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_pagar');
            $table->date('fecha_pago');
            $table->float('valor', 11, 2);
            $table->integer('cuenta_pagar_id')->unsigned();
            $table->integer('caja_id')->unsigned();

            $table->foreign('cuenta_pagar_id')->references('id')->on('cuentas_pagar');
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
        Schema::dropIfExists('cuentas_pagos');
    }
}
