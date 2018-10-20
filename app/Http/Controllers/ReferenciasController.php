<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Referencia;
use App\Http\Requests\ReferenciasRequest;

class ReferenciasController extends Controller
{
    /*
     * Listar referencias
     * 
     * @author Giovanni Neuta
     * @date 29/09/2018
     */
    public function index() {
        return view('dashboard.referencias.index');
    }

    /* 
     * Guardar en base de datos la referencia
     *  
     * @author Giovanni Neuta
     * @date 29/09/2018
     * @parameters int categoria_global_id - id de la categoría global
     * @parameters int categoria_id - id de la categoría
     * @parameters string nombre - nombre de la categoría
     * @parameters string codigo - opciona
     * @parameters int estado - 1 por defecto
     */
    public function store(ReferenciasRequest $request) {
        $referencia = new Referencia( $request->all() );
        //Guardar el registro
        $referencia->save();
        return;
    }
}
