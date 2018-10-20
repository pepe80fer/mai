<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    //Nommbre de la tabla de BD
    protected $table = "generos";
    //Nombre de los campos a mostrar
    protected $fillable = ['nombre','estado'];
}
