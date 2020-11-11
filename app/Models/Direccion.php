<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_via',
        'nombre_via',
        'numero',
        'planta',
        'puerta',
        'localidad',
        'provincia',
        'codigo_postal',
        'pais',
        'dni'
    ];

    // Funcion para obtener los fabricantes de una direccion
    public function fabricantes(){
        return $this->hasMany(Fabricante::class);
    }

     // Funcion para obtener los usuarios de una direccion
     public function users(){
        return $this->hasMany(User::class);
    }


}
