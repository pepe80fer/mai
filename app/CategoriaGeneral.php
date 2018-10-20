<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaGeneral extends Model
{
    //Nombre de la talba
    protected $table = "categorias_generales";
    //Nombre de los campos de la tabla a mostrar
    protected $fillable = ['nombre','operacion','estado'];

    /*
     * Recorrer la $data para armar un arreglo con id => value
     * 
     * @author Giovanni Neuta
     * @date 03/09/2018
     * @attributes $data listado de las categorias generales
     * @return arreglo con key = id, value = nombre
    */
    static function getNameWithId($data) {
        $result = array();
        //Validar que $data tenga contenido
        if( ! empty($data) ){
            foreach( $data AS $k => $value) {
                $result[ $value->id]  = $value->nombre;
            }
        }
        return $result;
    }

    public function categoriasTipos() {
        return $this->hasMany('App\CategoriaTipo');
    }
}
