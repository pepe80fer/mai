<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaReferencia extends Model
{
    //Nommbre de la tabla de BD
    protected $table = "categorias_referencias";
    //Nombre de los campos a mostrar
    protected $fillable = ['categorias_id','referencias_id','estado'];
}
