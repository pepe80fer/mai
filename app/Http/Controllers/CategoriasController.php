<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Http\Requests\CategoriasRequest;

class CategoriasController extends Controller
{
    /*
     * Listar las categorias
     * 
     * @author Giovanni Neuta
     * @date 04/09/2018
     */
    public function index() {
        $listado = Categoria::all()->sortBy('nombre');
        return view('dashboard.categorias.index')->with('categorias', $listado);
    }

    /* 
     * Guardar en base de datos la categoría
     *  
     * @author Giovanni Neuta
     * @date 04/09/2018
     * @parameters nombre {string}
     * @parameters estado {int} : 1
     */
    public function store(CategoriasRequest $request) {
        $categoria = new Categoria( $request->all() );
        //Guardar el registro
        $id = $categoria->save();
        //Guardar la relacion de la categoria global con la categoria en la tabla intermedia
        // $categoria->categoriasGlobales()->attach( $request->categoria_global_id );
        flash('La categoría ('.$categoria->nombre.') se ha registrado correctamente')->success()->important();
        return redirect()->route('categorias.index');
    }

    /* 
     * Actualizar los datos de la categoría
     *  
     * @author Giovanni Neuta
     * @date 04/09/2018
     * @parameters nombre {string}
     * @parameters estado {int} : 1
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
            'nombre' => 'required|min:2|max:50',
            'estado' => 'required'
        ]);
        //Consulta la categoría por el id y la actualiza
        Categoria::find($id)->update( $request->all() );
        //Mensaje para el usuario
        Flash('La categoría ('.$request->nombre.') se ha editado correctamente')->important();
        return;
    }

    /* 
     * Eliminar una categoría
     *  
     * @author Giovanni Neuta
     * @date 04/08/2018
     * @parameters id {int}
     */
    public function destroy($id) {
        //Consulta la categoría por el id
        $categoria = Categoria::find($id);
        //Elimina de base de datos el registro
        $categoria->delete();
        flash('La categoría ('.$categoria->nombre.') ha sido borrada')->warning()->important();
        return redirect()->route('categorias.index');
    }

    /* 
     * Obtener las categorias que estan habilitadas
     *  
     * @author Giovanni Neuta
     * @date 29/09/2018
     * @return json con el listado
     */
    public function getData() {
        return Categoria::where('estado',1)->orderBy('nombre')->get();
    }
}
