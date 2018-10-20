<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearCuentasPagarTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas_pagar', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('plazo_dias');
            $table->integer('cuotas');
            $table->float('valor', 11, 2);
            $table->binary('finalizado');
            $table->integer('compra_mercancia_id')->unsigned();
            $table->integer('obligacion_id')->unsigned();
            $table->integer('gasto_id')->unsigned();

            $table->foreign('compra_mercancia_id')->references('id')->on('compras_mercancias');
            $table->foreign('obligacion_id')->references('id')->on('obligaciones');
            $table->foreign('gasto_id')->references('id')->on('gastos');
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
        Schema::dropIfExists('cuentas_pagar');
    }
}
