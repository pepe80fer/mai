<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //Nommbre de la tabla de BD
    protected $table = "clientes";
    //Nombre de los campos a mostrar
    protected $fillable = ['codigo','nombres','apellidos','telefono','email','direccion'];
}
