<?php

namespace App\Models;

use App\Models\Producto;
use App\Models\Direccion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fabricante extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'pais',
        'telefono',
        'direccion_id',
        'web',
        'email'
    ];

    // Funcion para obtener los productos de un fabricante
    public function productos(){
        return $this->hasMany(Producto::class);
    }
    // Funcion para obtener la direccion de un fabricante
    public function direccion(){
        return $this->hasOne(Direccion::class);
    }
}
