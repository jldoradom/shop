<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineaPedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'pedido_id',
        'producto_id',
        'cantidad',
        'subtotal'
    ];


    // Funcion para obtener el pedido al que pertenece la linea
    public function pedido(){
        return $this->belongsTo(Pedido::class);
    }

    // Funcion para obtener la info del producto de la linea
    public function producto(){
        return $this->belongsTo(Producto::class);

    }
}
