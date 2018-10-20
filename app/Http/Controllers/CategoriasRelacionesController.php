<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoriaRelacion;
use App\Http\Requests\CategoriasRelacionesRequest;

class CategoriasRelacionesController extends Controller
{
    /* 
     * Guardar en base de datos la relacion
     *  
     * @author Giovanni Neuta
     * @date 15/10/2018
     * @parameters nombre {string}
     * @parameters estado {int} : 1
     */
    public function store(CategoriasRelacionesRequest $request) {
        // primero verifica si ya existe la relacion
        $existe = $this->find($request->categoria_global_id, $request->categoria_id);
        if( $existe->isEmpty() ) {
            // no existe, debe insertar la relación
            $categoriaRelacion = new CategoriaRelacion( $request->all() );
            //Guardar el registro
            $categoriaRelacion->save();
            return json_encode( $categoriaRelacion->id );
        } else {
            // ya existe la relación, retornar el id
            return json_encode( $existe->first()->id );
        }
    }

    public function show($id)
    {
        
    }

    public function find($categoria_global_id, $categoria_id)
    {
        return CategoriaRelacion::where('categoria_global_id',$categoria_global_id)->where('categoria_id',$categoria_id)->get();
    }
}
