<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Talla extends Model
{
    //Nommbre de la tabla de BD
    protected $table = "tallas";
    //Nombre de los campos a mostrar
    protected $fillable = ['talla','estado'];
}
