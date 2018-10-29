<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaGlobal extends Model
{
    //Nombre de la tabla
    protected $table = "categorias_globales";
    //Nombre de los campos de la tabla a mostrar
    protected $fillable = ['nombre','estado'];

    public function categorias() {
        return $this->belongsToMany('App\Categoria');
    }
}
