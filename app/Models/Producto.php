<?php

namespace App\Models;



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
        'uuid',
        'fabricante_id',
        'categoria_id',
        'codigo',
        'categoria_web'
    ];



    public function getImagePathAttribute(){
        return Storage::disk('public')->url($this->image);
    }

    // Funcion para obtener las imagenes de un producto
    public function imagenes(){
        return $this->hasMany(Imagen::class);
    }
    // Funcion para obtener el fabricante de un producto
    public function fabricante(){
        return $this->belongsTo(Fabricante::class);
    }

    // Relacion 1:1 entre el establecimiento y la categoria
    public function categoria(){
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
     // Funcion para obtener el usuario
     public function user(){
        return $this->hasOne(User::class);
    }
}
