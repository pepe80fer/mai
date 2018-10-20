<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoriaGlobal;
use App\Http\Requests\CategoriasGlobalesRequest;

class CategoriasGlobalesController extends Controller
{
        /*
     * Listar las categorias generales
     * 
     * @author Giovanni Neuta
     * @date 30/08/2018
     */
    public function index() {
        $listado = CategoriaGlobal::all()->sortBy('nombre');
        return view('dashboard.categoriasGlobales.index')->with('categoriasGlobales', $listado);
    }

    /* 
     * Guardar en base de datos la categoría global
     *  
     * @author Giovanni Neuta
     * @date 30/08/2018
     * @parameters nombre {string}
     * @parameters estado {int} : 1
     */
    public function store(CategoriasGlobalesRequest $request) {
        $categoria = new CategoriaGlobal( $request->all() );
        //Guardar el registro
        $id = $categoria->save();
        flash('La categoría global ('.$categoria->nombre.') se ha registrado correctamente')->success()->important();
        return redirect()->route('categoriasglobales.index');
    }

    /* 
     * Editar los datos de la categoría global
     *  
     * @author Giovanni Neuta
     * @date 30/08/2018
     * @parameters nombre {string}
     * @parameters estado {int} : 1
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
            'nombre' => 'required|min:2|max:50',
            'estado' => 'required'
        ]);
        //Consulta la categoría global por el id y actualizar
        CategoriaGlobal::find($id)->update( $request->all() );
        //Mensaje para el usuario
        Flash('La categoría global ('.$request->nombre.') se ha editado correctamente')->important();
        //Regresa a la vista del listado
        return;
    }

    /* 
     * Eliminar una categoría global
     *  
     * @author Giovanni Neuta
     * @date 30/08/2018
     * @parameters id {int}
     */
    public function destroy($id) {
        //Consulta la categoría global por el id
        $categoria = CategoriaGlobal::find($id);
        //Elimina de base de datos el registro
        $categoria->delete();
        flash('La categoría global ('.$categoria->nombre.') ha sido borrada')->warning()->important();
        return redirect()->route('categoriasglobales.index');
    }

    /* 
     * Obtener las categorias globales que estan habilitadas
     *  
     * @author Giovanni Neuta
     * @date 04/09/2018
     * @return json con el listado
     */
    public function getData() {
        return CategoriaGlobal::where('estado',1)->orderBy('nombre')->get();
    }
}
