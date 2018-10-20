<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoPrecio extends Model
{
    //Nommbre de la tabla de BD
    protected $table = "productos_precios";
    //Nombre de los campos a mostrar
    protected $fillable = ['precio_venta','precio_anterior','productos_id','estado'];
}
