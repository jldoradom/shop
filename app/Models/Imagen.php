<?php

namespace App\Models;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Imagen extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_producto',
        'path',
        'filename',
    ];



    public function producto(){
        return $this->belongsTo(Producto::class);
    }
}
