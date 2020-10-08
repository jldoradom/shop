<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;
use  Jantinnerezo\LivewireAlert\LivewireAlert;

class ProductoComponent extends Component
{

    use WithPagination;
    // use  LivewireAlert;
    // Propiedades publicas de la clase
    public $producto_id,$nombre,$descripcion,$precio,$stock,$confirming,$producto_estado;
    public $paginate = 5;
    public $search;
    public $view = 'producto.create';
    // Propiedades privadas
    protected $updatesQueryString = ['search'];

    protected $listeners = ['postAdded', 'eliminar', 'editar'];

    public function postAdded($id)
    {
       $this->revisar($id);
    }

    public function eliminar($id)
    {
       $this->destroy($id);
    }

    public function editar($id)
    {
       $this->edit($id);
    }


    // Funcion que renderiza la vista de los productos
    public function render()
    {
        // Devolvemos los productos filtrados
        return view('livewire.producto.producto-component', [
            'productos' => $this->search === 0 ?
            Producto::orderBy('created_at', 'DESC')->paginate($this->paginate) :
            Producto::where('nombre', 'like', '%'.$this->search.'%')->paginate($this->paginate)
        ]);
    }
    // Funcion que almacena un producto
    public function store(){
        // Validamos los campos
        $this->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'stock' => 'required|numeric'
        ]);

        Producto::create([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'precio' => $this->precio,
            'stock' => $this->stock,
        ]);
        // Una vez creado vaciamos los campos
        $this->nombre ='';
        $this->descripcion = '';
        $this->precio = '';
        $this->stock = '';

        session()->flash('message', 'Producto creado corréctamente.');



    }
    // Funcion para confirmar el borrado de un producto
    public function confirmDelete($id)
    {
        $this->confirming = $id;
    }


    // Funcion que destruye un producto
    public function destroy($id)
    {
        DB::table('productos')->where('id', '=', $id)->delete();
        // Enviamos mensaje de confirmacion
        session()->flash('eliminado', 'Producto con ID: ' . $id . ' eliminado.');

    }

    public function noeliminar(){
        $this->confirming = "";

    }
    // Funcion para editar un producto
    public function edit($id)
    {
        $producto = Producto::find($id);
        // Obtenemos los datos del producto para verlos en el form
        $this->producto_id = $producto->id;
        $this->nombre = $producto->nombre;
        $this->descripcion = $producto->descripcion;
        $this->precio = $producto->precio;
        $this->stock = $producto->stock;

        $this->view = 'producto.edit';
    }

     // Funcion que actualiza el producto
     public function update(){
        // Validamos los campos
        $this->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'stock' => 'required|numeric'
        ]);

        $producto = Producto::find($this->producto_id);


        $producto->update([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'precio' => $this->precio,
            'stock' => $this->stock,
        ]);


        // Enviamos mensaje de confirmacion
        session()->flash('message', "Producto actualizado corréctamente.");

        $this->default();



    }
    // Funcion que limpia los campos y vueve al from de creacion
    public function default(){

        $this->nombre ='';
        $this->descripcion = '';
        $this->precio = '';
        $this->stock = '';


        $this->view = 'producto.create';

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
    // Funcion para revisar toda la info del producto
    public function revisar($id){
        $producto = Producto::find($id);
        // Obtenemos los datos del producto para verlos en el form
        $this->producto_id = $producto->id;
        $this->nombre = $producto->nombre;
        $this->descripcion = $producto->descripcion;
        $this->precio = $producto->precio;
        $this->stock = $producto->stock;
        $this->producto_estado = $producto->estado;

        $this->view = 'producto.view';
    }








}









