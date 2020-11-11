<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\App;

class AdminController extends Controller
{

    public function __construct(){
        $this->middleware(['auth' , 'verified']);
    }

    public function productos(){
        return view('admin.productos');
    }

    public function users(){
        return view('admin.users');
    }

    public function fabricantes(){
        return view('admin.fabricantes');
    }

    public function productosDesactivar(){
        return view('admin.desactivar');
    }

    public function productosModificarPrecio(){
        return view('admin.precio');
    }

    public function pedidos(){
        return view('admin.pedidos');
    }

    public function downloadpdf($pedidoid)
    {
        //Obtener el pedido
        $pedido = Pedido::find($pedidoid);

        // Obtener el usuario
        $user = $pedido->usuario;

        // Obtenemos la direccion de usuario
        $direccion_user = $user->direccion;
        $direccion = $direccion_user->direccion;

        // Obtenemos las lineas de pedido
        $lineas = $pedido->lineaspedido;

        // Calculamos el iva y el total mas iva del pedido
        $iva = $pedido->total * 0.21;
        $totalmasIva = $iva + $pedido->total;


        $data = [
            'user' => $user,
            'pedido' => $pedido,
            'lineas' => $lineas,
            'direccion' => $direccion,
            'iva' => $iva,
            'totalmasIva' => $totalmasIva,
        ];

        $pdf = PDF::loadView('factura', $data);
        return $pdf->stream('factura.pdf');
    }


}
