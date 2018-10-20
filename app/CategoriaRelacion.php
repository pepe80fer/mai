<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaRelacion extends Model
{
    //Nombre de la tabla
    protected $table = "categoria_categoria_global";
    //Nombre de los campos de la tabla a mostrar
    protected $fillable = ['id','categoria_global_id','categoria_id'];

    // public function categorias() {
    //     return $this->belongsToMany('App\Categoria');
    // }
}
