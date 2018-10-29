<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referencia extends Model
{
    //Nommbre de la tabla de BD
    protected $table = "referencias";
    //Nombre de los campos a mostrar
    protected $fillable = ['nombre','codigo','categoria_relacion_id','estado'];

    public function categoriaRelacion() {
        return $this->belongsTo('App\CategoriaRelacion', 'categoria_relacion_id');
    }
}
