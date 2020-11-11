<?php

namespace App\Http\Livewire;



use App\Models\Imagen;
use Livewire\Component;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Fabricante;
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
    public $producto_id,$nombre,$descripcion,$precio,$confirming,$producto_estado,$search,
    $fabricante_nombre,$fabricante_id,$categoria_id,$categoria_nombre,$codigo,$categoria_web,$query,$subcategoria;
    public $uuid = '';
    public $paginate = 5;
    public $imagenes = [];
    public $fabricantes = [];
    public $categorias = [];
    public $imagenesgaleria = [];
    public $camposImagenes = 1;
    public $view = 'producto.create';
    // Propiedades privadas
    protected $queryString = [
        'search' => ['except' => ''],
        'fabricante_id' => ['except' => ''],
        'categoria_id' => ['except' => ''],
        'paginate' => ['except' => '5']

    ];
    protected $listeners = [
        'view',
        'eliminar',
        'editar',
        'file_upload_end' => 'handleFileUploaded',
        'eliminarImagen',
        'fabricante'
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


    // Montamos los datos iniciales necesarios
    public function mount(){
        // $this->$camposImagenes = 1;
        // $this->imagenes = [];

        $this->fabricantes = Fabricante::all();
        $this->categorias = Categoria::all();
    }

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
        return view('livewire.producto.producto-component', [
            'productos' => $this->fabricante_id ===  '' ?
            Producto::orderBy('created_at', 'DESC')->paginate($this->paginate) :
            Producto::orderBy('created_at', 'DESC')
                    ->orWhere('fabricante_id' ,'=' , $this->fabricante_id)
                    ->orWhere('categoria_id' ,'=' , $this->categoria_id)
                    ->orwhere('nombre', 'like' , '%'.$this->search.'%')
                    ->paginate($this->paginate)

        ]);

        // return view('livewire.producto.producto-component', [
        //    'productos' => Producto::where('nombre', 'like' , '%'.$this->search.'%')
        //             ->orWhere('fabricante_id' ,'=' , $this->fabricante_id)
        //             ->orWhere('categoria_id' ,'=' , $this->categoria_id)
        //             ->orderBy('created_at', 'DESC')
        //             ->paginate($this->paginate)

        // ]);

    }


    // Funcion que almacena un producto
    public function store(){
        // Validamos los campos
        $this->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'imagenes' => 'required',
            'codigo'  => 'required',
            'fabricante_id'  => 'required',
            'categoria_id'  => 'required',
            'categoria_web'  => 'required',
        ]);

        try {
            // Subimos las imagenes de la galeria y creamos el uuid
            $this->subirImagenes();
            // Subimos la imagen principal
            // $image =  $this->storeImage();

            Producto::create([
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
                'precio' => $this->precio,
                'estado' => 0,
                'uuid' =>   $this->uuid,
                'fabricante_id' => $this->fabricante_id,
                'categoria_id' => $this->categoria_id,
                'codigo' => $this->codigo,
                'categoria_web' => $this->categoria_web,
        ]);

        } catch (Throwable $e) {
            // Mostramos un mensaje de error
            if(config('app.locale')  == 'es'){
                session()->flash('error', 'Error al crear el producto.');
            } else {
                session()->flash('error', 'Error to created product.');
            }
            return redirect()->to('/admin/productos');
        }





        // Una vez creado vaciamos los campos
        $this->nombre ='';
        $this->descripcion = '';
        $this->precio = '';
        $this->imagenes = [];
        $this->fabricante_id = '';
        $this->categoria_id = '';
        $this->codigo = '';
        $this->categoria_web = '';

        $this->default();


        if(config('app.locale')  == 'es'){
            session()->flash('message', 'Producto creado corréctamente.');
        } else {
            session()->flash('message', 'Product created correctly.');
        }

        return redirect()->to('/admin/productos');


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
        $this->obtenerDatos($id);
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
            'codigo' => 'required',

        ]);

        $producto = Producto::find($this->producto_id);

        try {

            $producto->update([
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
                'precio' => $this->precio,
                'uuid' =>   $this->uuid,
                'fabricante_id' => $this->fabricante_id,
                'categoria_id' => $this->categoria_id,
                'codigo' => $this->codigo,
                'categoria_web' => $this->categoria_web,
            ]);

            // Comprobar si se actualiza la imagen
            // if($this->image){
            //     $image =  $this->storeImage();
            // }

            // Subimos las imagenes de la galeria y creamos el uuid
            $this->subirImagenes();

        } catch (Throwable $e) {
            // Mostramos un mensaje de error
            if(config('app.locale')  == 'es'){
                session()->flash('error', 'Error al actualizar  el producto.');
            } else {
                session()->flash('error', 'Error to updated product.');
            }
            return redirect()->to('/admin/productos');
        }

        $this->default();

        if(config('app.locale')  == 'es'){
            session()->flash('message', 'Producto actualizado corréctamente.');
        } else {
            session()->flash('message', 'Product updated correctly.');
        }

        return redirect()->to('/admin/productos');
    }
    // Funcion que limpia los campos y vueve al from de creacion
    public function default(){

        $this->nombre ='';
        $this->descripcion = '';
        $this->precio = '';
        $this->imagenes = [];
        $this->imagenesgaleria = [];
        $this->fabricante_id = '';
        $this->categoria_id = '';
        $this->codigo = '';
        $this->categoria_web = '';
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
    // Funcion para revisar toda la info del producto
    public function revisar($id){
        $this->obtenerDatos($id);
        // Obtener las imagenes de la tabla imagens
        $this->imagenesgaleria = Imagen::where('id_producto', '=', $this->uuid)->get();
        $this->view = 'producto.view';

    }

     // Obtener datos del producto seleccionado
     public function obtenerDatos($id){
        $producto = Producto::find($id);
        // Obtenemos los datos del producto para verlos en el form
        $this->producto_id = $producto->id;
        $this->categoria_id = $producto->categoria_id;
        $this->fabricante_id = $producto->fabricante_id;
        $this->nombre = $producto->nombre;
        $this->descripcion = $producto->descripcion;
        $this->precio = $producto->precio;
        $this->producto_estado = $producto->estado;
        $this->uuid = $producto->uuid;
        $this->fabricante_nombre = $producto->fabricante->nombre;
        $this->categoria_nombre = $producto->categoria->nombre;
        $this->codigo = $producto->codigo;
        $this->categoria_web = $producto->categoria_web;

        // Obtenemos la categoria padre del producto
        $categoria = $producto->categoria;
        $idpadre = $categoria->id_categoria_padre;
        // dd($idpadre);
        if($idpadre !== null){
            // dd($idpadre);
            $subcategoria = Categoria::find($idpadre);
            // dd($subcategoria);
            $this->subcategoria = $subcategoria->nombre;
        }




     }

    // Funcion para restear el search
    public function clear(){
        $this->search = '';
        $this->paginate = '5';
        $this->fabricante_id = '';
        $this->categoria_id = '';
        $this->page = 1;
    }

    // Funcion para eliminar imagenes de la galeria
    public function eliminarImagen($id){
        DB::table('imagens')->where('id', '=', $id)->delete();

    }








}









