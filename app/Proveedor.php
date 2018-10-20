<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    //Nommbre de la tabla de BD
    protected $table = "proveedores";
    //Nombre de los campos a mostrar
    protected $fillable = ['codigo','nombre','contacto','telefono','email','direccion','estado'];
}
