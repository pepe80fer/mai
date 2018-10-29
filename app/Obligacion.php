<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obligacion extends Model
{
    //Nommbre de la tabla de BD
    protected $table = 'obligaciones';
    //Nombre de los campos a mostrar
    protected $fillable = ['nombre','valor','dia_repite'];
}
