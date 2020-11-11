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

class ProductoDesactivarComponent extends Component
{


    use WithPagination;
    // Propiedades publicas de la clase
    public $producto_id,$nombre,$descripcion,$precio,$confirming,$producto_estado,$search,
    $fabricante_nombre,$fabricante_id,$categoria_id,$categoria_nombre,$codigo,$categoria_web,$query,$desactivar;
    public $paginate = 5;
    public $fabricantes = [];
    public $categorias = [];
    protected $productosFabricante = [];


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
        return view('livewire.producto.producto-desactivar-component' ,[
            'productos' => Producto::where('fabricante_id', '=' , $this->fabricante_id)
                    ->orWhere('categoria_id', '=' , $this->categoria_id)
                    ->orderBy('created_at', 'DESC')
                    ->paginate($this->paginate)
        ]);
    }

    // Funcion para cambiar estado de un producto y por tanto hacerlo publico
    public function cambiarEstado($id){
        $producto = Producto::find($id);
        $estadoProducto = $producto->estado;
        if($estadoProducto){
            $producto->update([
                'estado' => false

            ]);
        } else {
            $producto->update([
                'estado' => true

            ]);
        }
    }


    // Funcion para cambiar estado de productos
    public function desactivarProductosFabricante(){
        // Obtenemos los productos productos por fabricante seleccionado
        $this->productosFabricante = Producto::where('fabricante_id', '=' , $this->fabricante_id);
        // Los desactivamos
        $this->productosFabricante->update([
                'estado' => false

            ]);


        if(config('app.locale')  == 'es'){
            session()->flash('desactivados', 'Productos desactivados corréctamente.');
        } else {
            session()->flash('desactivados', 'Products desactivated correctly.');
        }
    }

    // Funcion para cambiar estado de productos
    public function desactivarProductosCategoria(){
        // Obtenemos los productos productos por fabricante seleccionado
        $this->productosFabricante = Producto::where('categoria_id', '=' , $this->categoria_id);
        // Los desactivamos
        $this->productosFabricante->update([
                'estado' => false

            ]);


        if(config('app.locale')  == 'es'){
            session()->flash('desactivados', 'Productos desactivados corréctamente.');
        } else {
            session()->flash('desactivados', 'Products desactivated correctly.');
        }
    }


    // Funcion para cambiar estado web de un producto y por tanto ponerlo en seccion rebajas
    public function cambiarCategoriaWeb($id){
        $producto = Producto::find($id);
        $categoriaWeb = $producto->categoria_web;
        if($categoriaWeb === 'destacado'){
            $producto->update([
                'categoria_web' => 'rebajado'

            ]);
        } else {
            $producto->update([
                'categoria_web' => 'destacado'

            ]);
        }
    }


    // Funcion para restear el search
    public function clear(){
        $this->paginate = '5';
        $this->fabricante_id = '';
        $this->categoria_id = '';
        $this->page = 1;
    }


}
