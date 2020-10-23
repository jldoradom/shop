<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'id_categoria_padre',
        'slug',
        'descripcion'
    ];


    // Funcion para obtener los productos de una Categroia
    public function productos(){
        return $this->hasMany(Producto::class);
    }
}
