<?php

namespace App\Http\Livewire;



use App\Models\Imagen;
use Livewire\Component;
use App\Models\Producto;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\auth;
use App\Providers\FileHelperProvider;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;

class ProductoComponent extends Component
{

    use WithPagination;
    use WithFileUploads;
    // Propiedades publicas de la clase
    public $producto_id,$nombre,$descripcion,$precio,$stock,$confirming,$producto_estado,$image,$search;
    public $uuid = '';
    public $paginate = 5;
    public $imagenes = [];
    public $imagenesgaleria = [];
    public $camposImagenes = 1;
    public $view = 'producto.create';
    // Propiedades privadas
    protected $queryString = [
        'search' => ['except' => ''],
        'paginate' => ['except' => '5']

    ];
    protected $listeners = [
        'view',
        'eliminar',
        'editar',
        'file_upload_end' => 'handleFileUploaded',
        'eliminarImagen'
    ];
    // Funciones que escuchan eventos lanzados desde JS
    public function view($id)
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

    // public function mount(){
    //     $this->$camposImagenes = 1;
    //     $this->imagenes = [];
    // }

    public function handleAddField(){
        $this->camposImagenes = $this->camposImagenes + 1;
    }

    public function handleFileUploaded($file){
        $this->imagenes[] = $file;
        logger($this->imagenes);

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
            'image' => 'required',
            'imagenes' => 'required',
        ]);

        // Subimos las imagenes de la galeria y creamos el uuid
        $this->subirImagenes();
        // Subimos la imagen principal
        $image =  $this->storeImage();

        Producto::create([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'precio' => $this->precio,
            'stock' => $this->stock,
            'estado' => 0,
            'image' => $image,
            'user_id' => auth::user()->id,
            'uuid' =>   $this->uuid
        ]);





        // Una vez creado vaciamos los campos
        $this->nombre ='';
        $this->descripcion = '';
        $this->precio = '';
        $this->stock = '';
        $this->image = '';
        $this->imagenes = [];


        if(config('app.locale')  == 'es'){
            session()->flash('message', 'Producto creado corréctamente.');
        } else {
            session()->flash('message', 'Product created correctly.');
        }




    }
    // Funcion para subir imagenes de la galeria del producto
    public function subirImagenes(){
        if(!$this->imagenes){
            return null;
        }

        if($this->uuid === ''){
            // creamos un uuid unico para enlazar las imagenes con el producto
            $this->uuid = Str::uuid()->toString();
        }

        // dd($this->imagenes);
        foreach($this->imagenes as $imagen) {

            // $img = ImageManagerStatic::make($imagen)->encode('jpg');
            // $nombreImagen = $imagen['filename'];
            // dd($nombreImagen);
            try{

                $info = FileHelperProvider::getFileInfo($imagen['data']);

                $filename = $imagen['filename'];
                // dd($filename);

                $path = "public/galeria/{$this->uuid}/{$filename}";



                Storage::put($path, $info['decoded_file']);

            } catch(\Exception $e) {
                logger($e->getMessage());
            }

            $existeImagen = Imagen::where('filename' , '=' , $filename)->get();
            // dd($existeImagen);
            // $this->imagenesgaleria = Imagen::where('id_producto', '=', $this->uuid)->get();


            if(count($existeImagen) <= 0){
                Imagen::create([
                    'id_producto' => $this->uuid,
                    'path' => $path,
                    'filename' => $filename
                ]);
            }



        }

        $this->imagenes = [];
    }

    // Funcion para comprobar que tenemos la imagen y almacenarla
    public function storeImage(){
        if(!$this->image){
            return null;
        }

        $img = ImageManagerStatic::make($this->image)->encode('jpg');

        $nameImage = $this->uuid. '.jpg';

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
    public function edit($id){
        $producto = Producto::find($id);
        // Obtenemos los datos del producto para verlos en el form
        $this->producto_id = $producto->id;
        $this->nombre = $producto->nombre;
        $this->descripcion = $producto->descripcion;
        $this->precio = $producto->precio;
        $this->stock = $producto->stock;
        $this->uuid = $producto->uuid;
        // Obtener las imagenes de la tabla imagens
        $this->imagenesgaleria = Imagen::where('id_producto', '=', $this->uuid)->get();
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
            'uuid' =>   $this->uuid
        ]);

        // Comprobar si se actualiza la imagen
        if($this->image){
            $image =  $this->storeImage();
        }

        // Subimos las imagenes de la galeria y creamos el uuid
        $this->subirImagenes();



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
        $this->imagen = '';
        $this->imagenes = [];
        $this->imagenesgaleria = [];
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
        $this->uuid = $producto->uuid;
        // Obtener las imagenes de la tabla imagens
        $this->imagenesgaleria = Imagen::where('id_producto', '=', $this->uuid)->get();
        $this->view = 'producto.view';
    }

    // Funcion para restear el search
    public function clear(){
        $this->search = '';
        $this->paginate = '5';
        $this->page = 1;
    }

    // Funcion para eliminar imagenes de la galeria
    public function eliminarImagen($id){
        DB::table('imagens')->where('id', '=', $id)->delete();

        // Enviamos mensaje de confirmacion
        if(config('app.locale')  == 'es'){
            session()->flash('messageImagen', 'Imagen con ID: ' . $id . ' eliminada.');
        } else {
            session()->flash('messageImagen', 'Imagen with ID: ' . $id . ' removed.');
        }
    }








}









