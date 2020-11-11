<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total',
        'estado',
        'observaciones',
        'facturado',
        'seguimiento',
        'observaciones',
        'pago',
        'ref'

    ];

    // Funcion para obtener las lineas del pedido
    public function lineaspedido(){
        return $this->hasMany(LineaPedido::class);
    }
    // Funcion para obtener el usuario del pedido
    public function usuario(){
        return $this->belongsTo(User::class, 'user_id');
    }

    // Calcular y actualizar el total del Pedido
    public function addTotal($total){
        $this->update([
            'total' => $total,
        ]);
    }


}
