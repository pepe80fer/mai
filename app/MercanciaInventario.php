<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MercanciaInventario extends Model
{
    //Nommbre de la tabla de BD
    protected $table = "mercancia_inventario";
    //Nombre de los campos a mostrar
    protected $fillable = ['fecha','proveedores_id','productos_id','cantidad','costo_unidad','costo_total','cantidad_salida','cantidad_disponible'];
}
