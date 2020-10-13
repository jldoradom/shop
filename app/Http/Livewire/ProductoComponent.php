<?php

namespace App\Http\Livewire;



use Illuminate\Support\Facades\auth;
use Livewire\Component;
use App\Models\Producto;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;

class ProductoComponent extends Component
{

    use WithPagination;
    use WithFileUploads;
    // Propiedades publicas de la clase
    public $producto_id,$nombre,$descripcion,$precio,$stock,$confirming,$producto_estado,$image,$search;
    public $paginate = 5;
    public $view = 'producto.create';
    // Propiedades privadas
    protected $queryString = [
        'search' => ['except' => ''],
        'paginate' => ['except' => '5']

    ];
    protected $listeners = ['postAdded', 'eliminar', 'editar'];
    // Funciones que escuchan eventos lanzados desde JS
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
        // return view('livewire.producto.producto-component', [
        //     'productos' => $this->search === 0 ?
        //     Producto::orderBy('created_at', 'DESC')->paginate($this->paginate) :
        //     Producto::where('nombre', 'like', '%'.$this->search.'%')->paginate($this->paginate)
        // ]);

        return view('livewire.producto.producto-component', [
           'productos' => Producto::where('nombre', 'like' , '%'.$this->search.'%')
                ->orderBy('created_at', 'DESC')
                // ->orWhere('campo' ,'like' , '%'.$this->search.'%')
                ->paginate($this->paginate)
        ]);

    }
    // Funcion que almacena un producto
    public function store(){
        // Validamos los campos
        $this->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'stock' => 'required|numeric',
            'image' => 'required'
        ]);

        $image =  $this->storeImage();

        Producto::create([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'precio' => $this->precio,
            'stock' => $this->stock,
            'estado' => 0,
            'image' => $image,
            'user_id' => auth::user()->id
        ]);



        // Una vez creado vaciamos los campos
        $this->nombre ='';
        $this->descripcion = '';
        $this->precio = '';
        $this->stock = '';
        $this->image = '';


        if(config('app.locale')  == 'es'){
            session()->flash('message', 'Producto creado corréctamente.');
        } else {
            session()->flash('message', 'Product created correctly.');
        }




    }
    // Funcion para comprobar que tenemos la imagen y almacenarla
    public function storeImage(){
        if(!$this->image){
            return null;
        }

        $img = ImageManagerStatic::make($this->image)->encode('jpg');

        $nameImage = Str::random(). '.jpg';

        Storage::disk('public')->put($nameImage, $img);

        return $nameImage;
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
        if(config('app.locale')  == 'es'){
            session()->flash('eliminado', 'Producto con ID: ' . $id . ' eliminado.');
        } else {
            session()->flash('eliminado', 'Product with ID: ' . $id . ' removed.');
        }


    }
    // Funcion para denegar la eliminacion del prpoducto
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
        $this->image = $producto->image;

        $this->view = 'producto.view';
    }

    // Funcion para restear el search
    public function clear(){
        $this->search = '';
        $this->paginate = '5';
        $this->page = 1;
    }








}









