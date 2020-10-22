<?php

namespace App\Models;

use App\Models\Imagen;
use App\Models\Fabricante;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'estado',
        'user_id',
        'uuid',
        'fabricante_id',
        'categoria_id',
        'codigo',
        'categoria_web'
    ];



    public function getImagePathAttribute(){
        return Storage::disk('public')->url($this->image);
    }


    // Funcion para obtener las imagenes de un usuario
    public function imagenes(){
        return $this->hasMany(Imagen::class);
    }
    // Funcion para obtener el fabricante de un producto
    public function fabricante(){
        return $this->belongsTo(Fabricante::class);
    }
    // Funcion para obtener la categoria de un producto
    public function categoria(){
        return $this->belongsTo(Fabricante::class);
    }
}
