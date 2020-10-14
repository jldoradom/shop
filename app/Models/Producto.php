<?php

namespace App\Models;

use App\Models\Imagen;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'image',
        'precio',
        'stock',
        'estado',
        'user_id',
        'uuid'
    ];



    public function getImagePathAttribute(){
        return Storage::disk('public')->url($this->image);
    }



    public function imagenes(){
        return $this->hasMany(Imagen::class);
    }
}
