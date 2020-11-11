<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Collection;

class Fabricante extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
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
