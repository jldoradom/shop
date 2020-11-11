<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Fabricante;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

class ProductoPrecioComponent extends Component
{
    use WithPagination;
    // Propiedades publicas de la clase
    public $producto_id,$nombre,$descripcion,$precio,$confirming,$producto_estado,$search,
    $fabricante_nombre,$fabricante_id,$categoria_id,$categoria_nombre,$codigo,$categoria_web,
    $query,$cantidadFabricante,$cantidadCategoria,$precioFinal,$volverAtrasFabricante=false,$volverAtrasCategoria=false,$descuentoFabricante,$descuentoCategoria;
    public $paginate = 5;
    public $fabricantes = [];
    public $categorias = [];

    protected $queryString = [
        'fabricante_id' => ['except' => ''],
        'paginate' => ['except' => '5']

    ];

    public function mount(){
        $this->fabricantes = Fabricante::all();
        $this->categorias = Categoria::all();
    }


    public function render()
    {
        return view('livewire.producto.producto-precio-component', [
            'productos' => Producto::where('fabricante_id', '=' , $this->fabricante_id)
                    ->orWhere('categoria_id', '=' , $this->categoria_id)
                    ->orderBy('created_at', 'DESC')
                    ->paginate($this->paginate)
        ]);


        $this->clear();
    }

      // Funcion para restear el search
      public function clear(){
        $this->paginate = '5';
        $this->fabricante_id = '';
        $this->categoria_id = '';
        $this->page = 1;
    }

    //  Funcion para modificar el precio por fabricantes
    public function modificarPrecioFabricante() {
        // Obtenemos los productos productos por fabricante seleccionado
        $productosFabricante = Producto::where('fabricante_id', '=' , $this->fabricante_id);
        $productosFabricantePrecios = Producto::where('fabricante_id', '=' , $this->fabricante_id)->value('precio');

        // Validamos los campos
        $this->validate([
            'cantidadFabricante' => 'required|numeric|min:1',
        ]);

        // Hacemos el descuento
        $this->descuentoFabricante = ($this->cantidadFabricante * $productosFabricantePrecios ) / 100;
        $this->precioFinal = $productosFabricantePrecios - $this->descuentoFabricante;

        $productosFabricante->update([
            'precio' => $this->precioFinal

        ]);

        // Activamos la posibilidad de volver atars los precios
        $this->volverAtrasFabricante = true;

        if(config('app.locale')  == 'es'){
            session()->flash('desactivados', 'Actualizado precio productos corréctamente.');
        } else {
            session()->flash('desactivados', 'Updated product price correctly.');
        }


    }

    //  Funcion para modificar el precio por fabricantes
    public function modificarPrecioCategoria(){
        // Obtenemos los productos productos por fabricante seleccionado
        $productosCategoria = Producto::where('categoria_id', '=' , $this->categoria_id);
        $productosCategoriaPrecios = Producto::where('categoria_id', '=' , $this->categoria_id)->value('precio');

        // Validamos los campos
        $this->validate([
            'cantidadCategoria' => 'required|numeric|min:1',
        ]);

        // Hacemos el descuento
        $this->descuentoCategoria = ($this->cantidadCategoria * $productosCategoriaPrecios) / 100;

        $this->precioFinal = $productosCategoriaPrecios -  $this->descuentoCategoria;

        // Volvemos atras el descuento
        // $this->precioFinal = $this->cantidadCategoria * $productosCategoriaPrecios;

        $productosCategoria->update([
            'precio' => $this->precioFinal

        ]);

        // Activamos la posibilidad de volver atars los precios
        $this->volverAtrasCategoria = true;


        if(config('app.locale')  == 'es'){
            session()->flash('desactivados', 'Actualizado precio productos corréctamente.');
        } else {
            session()->flash('desactivados', 'Updated product price correctly.');
        }


    }

    // Funcion para volver los precios antes de una modificacion
    public function atrasPrecioFabricante(){
        $productosFabricante = Producto::where('fabricante_id', '=' , $this->fabricante_id);
        // $productosFabricantePrecios = Producto::where('fabricante_id', '=' , $this->fabricante_id)->value('precio');

        if($this->volverAtrasFabricante){
            // Volvemos atras el descuento
            $precioFinalAtras = (100 * $this->descuentoFabricante) / $this->cantidadFabricante;

            $productosFabricante->update([
                'precio' => $precioFinalAtras

            ]);

        }

        $this->default();

        // Desactivamos el boton
        $this->volverAtrasFabricante = false;

    }

      // Funcion para volver los precios antes de una modificacion
      public function atrasPrecioCategoria(){
        $productosCategoria = Producto::where('categoria_id', '=' , $this->categoria_id);
        // $productosCategoriaPrecios = Producto::where('categoria_id', '=' , $this->categoria_id)->value('precio');

        if($this->volverAtrasCategoria){
            // Volvemos atras el descuento
            $precioFinalAtras = (100 * $this->descuentoCategoria) / $this->cantidadCategoria;

            $productosCategoria->update([
                'precio' => $precioFinalAtras

            ]);

        }

        $this->default();

        // Desactivamos el boton
        $this->volverAtrasCategoria = false;

    }

    // Funcion que limpia los campos y vueve al from de creacion
    public function default(){

        $this->cantidadCategoria ='';
        $this->cantidadFabricante = '';
        $this->precioFinal = '';
        $this->descuento ='';
        $this->precioFinal = '';
        // $this->imagenes = [];
        // $this->imagenesgaleria = [];


    }
}
