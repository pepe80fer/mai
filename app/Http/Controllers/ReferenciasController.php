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
        return view('dashboard.referencias.index',
                    ['listaReferencias' => $this->getData() ]);
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

    /* 
     * Actualizar los datos de la referencia
     *  
     * @author Giovanni Neuta
     * @date 27/10/2018
     * @parameters string nombre
     * @parameters string código
     * @parameters estado {int} : 1
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
            'nombre' => 'required|min:2|max:50|unique:referencias,nombre',
            'codigo' => 'nullable|min:2|max:50'
        ]);
        //Consulta la referencia por el id y la actualiza
        Referencia::find($id)->update( $request->all() );
        return;
    }

    /* 
     * Eliminar una referencia
     *  
     * @author Giovanni Neuta
     * @date 27/10/2018
     * @parameters id {int}
     */
    public function destroy($id) {
        //Consulta la referencia por el id
        $referencia = Referencia::find($id);
        //Elimina de base de datos el registro
        $referencia->delete();
        return;
    }

    /* 
     * Obtener las referencias que estan habilitadas
     *  
     * @author Giovanni Neuta
     * @date 27/10/2018
     * @return json con el listado
     */
    public function getData() {
        return Referencia::where('estado',1)->orderBy('nombre')->get();
    }
}
