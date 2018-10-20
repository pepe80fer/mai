<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //Nommbre de la tabla de BD
    protected $table = "categorias";
    //Nombre de los campos a mostrar
    protected $fillable = ['nombre','estado'];

    public function categoriasGlobales() {
        return $this->belongsToMany('App\CategoriaGlobal');
    }
}
