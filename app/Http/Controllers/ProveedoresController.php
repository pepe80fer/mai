<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;
use App\Http\Requests\ProveedoresRequest;

class ProveedoresController extends Controller
{
    /*
     * Listar proveedores
     * 
     * @author Giovanni Neuta
     * @date 10/09/2018
     */
    public function index() {
        return view('dashboard.proveedores.index');
    }

    /* 
     * Guardar en base de datos el proveedor
     *  
     * @author Giovanni Neuta
     * @date 10/09/2018
     * @parameters codigo {string}
     * @parameters nombre {string}
     * @parameters contacto {string}
     * @parameters telefono {string}
     * @parameters email {string}
     * @parameters direccion {string}
     * @parameters estado {bolean}
     */
    public function store(ProveedoresRequest $request) {
        $proveedor = new proveedor( $request->all() );
        //Guardar el registro
        $proveedor->save();
        return;
    }

    /* 
     * Actualizar los datos del proveedor
     *  
     * @author Giovanni Neuta
     * @date 10/09/2018
     * @parameters codigo {string}
     * @parameters nombre {string}
     * @parameters contacto {string}
     * @parameters telefono {string}
     * @parameters email {string}
     * @parameters direccion {string}
     * @parameters estado {bolean}
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
            'codigo'    => 'required|min:1|max:50',
            'nombre'    => 'required|min:2|max:100',
            'contacto'  => 'nullable|min:2|max:50',
            'telefono'  => 'required|min:4|max:100',
            'email'     => 'nullable|email|max:100',
            'direccion' => 'nullable|max:255',
            'estado'    => 'required'
        ]);
        //Consulta el proveedor por el id y la actualiza
        Proveedor::find($id)->update( $request->all() );
        return;
    }

    /* 
     * Eliminar un proveedor
     *  
     * @author Giovanni Neuta
     * @date 10/09/2018
     * @parameters id {int}
     */
    public function destroy($id) {
        //Consulta el proveedor por el id y lo elimina
        Proveedor::find($id)->delete();
        return;
    }

    /* 
     * Obtener los proveedores
     *  
     * @author Giovanni Neuta
     * @date 10/09/2018
     * @return json con el listado
     */
    public function getData() {
        return Proveedor::all();
    }
}
