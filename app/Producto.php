<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //Nommbre de la tabla de BD
    protected $table = "productos";
    //Nombre de los campos a mostrar
    protected $fillable = ['nombre','categorias_referencias_id','generos_id','tallas_id','estado'];
}
