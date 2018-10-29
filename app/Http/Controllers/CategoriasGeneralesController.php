<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoriaGeneral;
use App\Http\Requests\CategoriasGeneralesRequest;

class CategoriasGeneralesController extends Controller
{
    /*
     * Listar las categorias generales
     * 
     * @author Giovanni Neuta
     * @date 30/08/2018
     */
    public function index() {
        $listado = CategoriaGeneral::all()->sortBy('nombre');
        return view('dashboard.categoriasGenerales.index')->with('categoriasGenerales', $listado);
    }

    /*
     * Registrar la categoria general
     * 
     * @author Giovanni Neuta
     * @date 30/08/2018
     */
    public function create() {
        return view('dashboard.categoriasGenerales.create');
    }

    /* 
     * Guardar en base de datos la categoría general
     *  
     * @author Giovanni Neuta
     * @date 30/08/2018
     * @parameters nombre {string}
     * @parameters operacion {char}
     * @parameters estado {int} : 1
     */
    public function store(CategoriasGeneralesRequest $request) {
        $categoriaGeneral = new CategoriaGeneral( $request->all() );
        //Guardar el registro
        $id = $categoriaGeneral->save();
        flash('La categoría general ('.$categoriaGeneral->nombre.') se ha registrado correctamente')->success()->important();
        return redirect()->route('categoriasgenerales.create');
    }

    /* 
     * Editar los datos de la categoría general
     *  
     * @author Giovanni Neuta
     * @date 30/08/2018
     * @parameters id {int}
     */
    public function edit($id) {
        //Consulta la categoría general por el id
        $categoriaGeneral = CategoriaGeneral::find($id);
        return view('dashboard.categoriasGenerales.edit')->with('categoriaGeneral',$categoriaGeneral);
    }

    /* 
     * Editar los datos de la categoría general
     *  
     * @author Giovanni Neuta
     * @date 30/08/2018
     * @parameters nombre {string}
     * @parameters operacion {char}
     * @parameters estado {int} : 1
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
            'nombre' => 'required|min:2|max:50',
            'operacion' => 'required',
            'estado' => 'required'
        ]);
        //Consulta la categoría general por el id y actualizar
        CategoriaGeneral::find($id)->update( $request->all() );
        //Cambia los valores por los enviados
        // $categoriaGeneral->nombre = $request->nombre;
        // $categoriaGeneral->operacion = $request->operacion;
        // $categoriaGeneral->estado = $request->estado;
        // //Hace la actualizacion
        // $categoriaGeneral->save();
        //Mensaje para el usuario
        Flash('La categoría general ('.$request->nombre.') se ha editado correctamente')->important();
        //Regresa a la vista del listado
        return;// redirect()->route('categoriasgenerales.index');
    }

    /* 
     * Eliminar una categoría general
     *  
     * @author Giovanni Neuta
     * @date 30/08/2018
     * @parameters id {int}
     */
    public function destroy($id) {
        //Consulta la categoría general por el id
        $categoriaGeneral = CategoriaGeneral::find($id);
        //Elimina de base de datos el registro
        $categoriaGeneral->delete();
        flash('La categoría general ('.$categoriaGeneral->nombre.') ha sido borrada')->warning()->important();
        return redirect()->route('categoriasgenerales.index');
    }

    /* 
     * Obtener las categorias generales que estan habilitadas
     *  
     * @author Giovanni Neuta
     * @date 04/09/2018
     * @return json con el listado
     */
    public function getData() {
        return CategoriaGeneral::where('estado',1)->orderBy('nombre')->get();
    }
}
