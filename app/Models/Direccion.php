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
        'pais',
        'codigo_postal'
    ];


}
