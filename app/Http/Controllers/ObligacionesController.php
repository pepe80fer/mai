<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Obligacion;
use App\Http\Requests\ObligacionesRequest;

class ObligacionesController extends Controller
{
    /*
     * Listar las obligaciones
     * 
     * @author Giovanni Neuta
     * @date 12/09/2018
     */
    public function index() {
        return view('dashboard.obligaciones.index');
    }

    /* 
     * Guardar en base de datos la obligacion
     *  
     * @author Giovanni Neuta
     * @date 12/09/2018
     * @parameters nombre {string}
     * @parameters valor {float}
     * @parameters dia_repite {date}
     */
    public function store(ObligacionesRequest $request) {
        $obligacion = new Obligacion( $request->all() );
        //Guardar el registro
        $obligacion->save();
        return;
    }

    /* 
     * Actualizar los datos de la obligacion
     *  
     * @author Giovanni Neuta
     * @date 12/09/2018
     * @parameters nombre {string}
     * @parameters valor {float}
     * @parameters dia_repite {date}
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
            'nombre'      => 'required|min:2|max:50',
            'valor'       => 'required|numeric',
            'dia_repite'  => 'required|min:1|max:2'
        ]);
        //Consulta la obligacion por el id y la actualiza
        Obligacion::find($id)->update( $request->all() );
        return;
    }

    /* 
     * Eliminar una obligacion
     *  
     * @author Giovanni Neuta
     * @date 12/09/2018
     * @parameters id {int}
     */
    public function destroy($id) {
        //Consulta la obligacion por el id y lo elimina
        Obligacion::find($id)->delete();
        return;
    }

    /* 
     * Obtener las obligaciones
     *  
     * @author Giovanni Neuta
     * @date 12/09/2018
     * @return json con el listado
     */
    public function getData() {
        return Obligacion::all();
    }
}
