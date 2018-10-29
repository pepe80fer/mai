<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Talla;
use App\Http\Requests\TallasRequest;

class TallasController extends Controller
{
    /*
     * Listar tallas
     * 
     * @author Giovanni Neuta
     * @date 07/09/2018
     */
    public function index() {
        return view('dashboard.tallas.index');
    }

    /* 
     * Guardar en base de datos la categoría
     *  
     * @author Giovanni Neuta
     * @date 04/09/2018
     * @parameters talla {string}
     * @parameters estado {int} : 1
     */
    public function store(TallasRequest $request) {
        $talla = new Talla( $request->all() );
        //Guardar el registro
        $talla->save();
        return;
    }

    /* 
     * Actualizar los datos de la talla
     *  
     * @author Giovanni Neuta
     * @date 04/09/2018
     * @parameters talla {string}
     * @parameters estado {int} : 1
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
            'talla' => 'required|min:1|max:5',
            'estado' => 'required'
        ]);
        //Consulta la talla por el id y la actualiza
        Talla::find($id)->update( $request->all() );
        return;
    }

    /* 
     * Eliminar una categoría
     *  
     * @author Giovanni Neuta
     * @date 07/09/2018
     * @parameters id {int}
     */
    public function destroy($id) {
        //Consulta la categoría por el id
        $talla = Talla::find($id);
        //Elimina de base de datos el registro
        $talla->delete();
        return;
    }

    /* 
     * Obtener las tallas que estan habilitadas
     *  
     * @author Giovanni Neuta
     * @date 07/09/2018
     * @return json con el listado
     */
    public function getData() {
        return Talla::all();
    }
}
