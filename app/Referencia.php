<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referencia extends Model
{
    //Nommbre de la tabla de BD
    protected $table = "referencias";
    //Nombre de los campos a mostrar
    protected $fillable = ['nombre','codigo','estado'];
}
