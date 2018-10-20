<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Http\Requests\ClientesRequest;
use App\Http\Requests\ClienteEditRequest;

class ClientesController extends Controller
{
    /*
     * Listar clientes
     * 
     * @author Giovanni Neuta
     * @date 07/09/2018
     */
    public function index() {
        return view('dashboard.clientes.index');
    }

     /* 
     * Guardar en base de datos el cliente
     *  
     * @author Giovanni Neuta
     * @date 08/09/2018
     * @parameters codigo {string}
     * @parameters nombres {string}
     * @parameters apellidos {string}
     * @parameters telefono {string}
     * @parameters email {string}
     * @parameters direccion {string}
     */
    public function store(ClientesRequest $request) {
        $cliente = new Cliente( $request->all() );
        //Guardar el registro
        $cliente->save();
        return;
    }

    /* 
     * Actualizar los datos del cliente
     *  
     * @author Giovanni Neuta
     * @date 08/09/2018
     * @parameters codigo {string}
     * @parameters nombres {string}
     * @parameters apellidos {string}
     * @parameters telefono {string}
     * @parameters email {string}
     * @parameters direccion {string}
     */
    public function update(ClienteEditRequest $request, $id) {
        //Consulta el cliente por el id y la actualiza
        Cliente::find($id)->update( $request->all() );
        return;
    }

    /* 
     * Eliminar un cliente
     *  
     * @author Giovanni Neuta
     * @date 08/09/2018
     * @parameters id {int}
     */
    public function destroy($id) {
        //Consulta el cliente por el id
        $cliente = Cliente::find($id);
        //Elimina de base de datos el registro
        $cliente->delete();
        return;
    }

    /* 
     * Obtener los clientes
     *  
     * @author Giovanni Neuta
     * @date 08/09/2018
     * @return json con el listado
     */
    public function getData() {
        return Cliente::all();
    }
}
