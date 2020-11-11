<?php

namespace App\Http\Livewire;

use Throwable;
use App\Models\Role;
use App\Models\User;
use App\Models\Imagen;
use App\Models\Pedido;
use Livewire\Component;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Direccion;
use App\Models\role_user;
use App\Models\Fabricante;
use App\Mail\ContactoEmail;
use App\Models\LineaPedido;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\direccion_user;
use App\Controllers\PdfController;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Providers\FileHelperProvider;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;



class PedidoComponent extends Component
{
    use WithPagination;
    // Propiedades publicas de la clase
    public $user_id,$search,$pais,$telefono,$web,$email,$direccion,$pedido_id,
    $tipo_via,$nombre_via,$numero,$planta,$puerta,$localidad,$provincia,$codigo_postal,$confirming,$confiremail,$name,$dni,
    $totalpedidos,$pedido,$producto_id,$pedidoId,
    $ref,$total,$estado,$facturado,$seguimiento,$observaciones,$pago,
    $cantidadLinea=[],$subtotal,$productosSelect=[],$nuevoproducto,$producto;
    public $view = 'pedido.create';
    public $paginate = 5;
    public $camposLineas;
    public $lineaspedidos = [];
    public $listaproductos = [];
    public $productos = [];
    public $usuarios = [];

    protected $queryString = [
        'ref' => ['except' => ''],
        'paginate' => ['except' => '5']

    ];

    protected $listeners = [
        'view',
        'editar',
        'eliminar',
        'verpedido',
        'productoemitido',
        'addproducto',
        'enviar'
    ];

    // Funciones que escuchan eventos lanzados
    public function view($id)
    {
       $this->revisar($id);
    }

    public function eliminar($id)
    {
       $this->destroy($id);
    }

    public function enviar($id)
    {
       $this->enviarEmail($id);
    }

    public function editar($id)
    {
       $this->edit($id);
    }

    public function verpedido($id)
    {
       $this->pedidos($id);
    }

    public function addproducto($id){
        $this->addproductos($id);
    }

    public function addproductos($id){
        $this->productosSelect[] = $id;
        // if(count($this->productosSelect) > 1) {
        //     dd($this->productosSelect);
        // }
    }

    public function productoemitido($idproducto){
        $this->productosSelect[] = $idproducto;
        dd($idproducto['idproducto']);
    }

    // Montamos los datos iniciales necesarios
    public function mount(){
        $this->usuarios = User::all();
    }

    public function render()
    {
        return view('livewire.pedido.pedido-component', [
            'pedidos' => Pedido::Where('ref', 'like' , '%'.$this->search.'%')
                                ->orWhere('estado' , '=' , $this->estado)
                                ->paginate($this->paginate)
        ]);

    }

     // Funcion que almacena un pedido
     public function store(){
        // Validamos los campos
        $this->validate([
            'user_id' => 'required',
            'pago' => 'required',
            'observaciones' => 'required',
            'estado' => 'required',

        ]);


        // Creamos un codigo de referebcia para el pedido
        $this->ref = 'traza' . Str::random(5);

        // Crear url de seguimiento del pedido
        //TODO: Crear url de seguimiento del pedido que nos dara la empresa de transporte
        $this->seguimiento = 'http://seur.es/' . Str::random(5);

        try{

            $this->pedidoId =  Pedido::create([
                'user_id' => $this->user_id,
                'pago' => $this->pago,
                'estado' => $this->estado,
                'observaciones' =>   $this->observaciones,
                'ref' =>   $this->ref,
                'seguimiento' =>   $this->seguimiento,
            ]);



            // Actualizamos el total del pedido
            $total = LineaPedido::where('pedido_id' , '=' , $this->pedidoId->id)->sum('subtotal');
            $pedido = Pedido::find($this->pedidoId->id);
            $pedido->addTotal($total);


        } catch (Throwable $e) {
            // Mostramos un mensaje de error
            if(config('app.locale')  == 'es'){
                session()->flash('error', 'Error al crear el pedido.');
            } else {
                session()->flash('error', 'Error to created Order.');
            }
            return redirect()->to('/admin/pedidos');
        }

        // Limpiamos los campos
        $this->default();

        // Mostramos un mensaje de
        if(config('app.locale')  == 'es'){
            session()->flash('message', 'Pedido creado corréctamente.');
        } else {
            session()->flash('message', 'Order created correctly.');
        }

        return redirect()->to('/admin/pedidos');


    }

    // public function addLineas($lineas){
    //     dd($lineas);

    //     foreach ($lineas as $idproducto )  {
    //         dd($idproducto);
    //         $this->nuevoproducto = Producto::find($idproducto);

    //         $this->subtotal = 2 * $this->nuevoproducto->precio;

    //         LineaPedido::create([
    //             'pedido_id' => $this->pedidoId->id,
    //             'producto_id' => $idproducto,
    //             'cantidad' => $this->cantidadLinea,
    //             'subtotal' => $this->subtotal,
    //         ]);
    //     }
    // }


    // public function addLineasPedido(){
    //     $this->camposLineas = $this->camposLineas + 1;

    // }

    // public function addArrayLineas($id){
    //     $this->listaproductos[] = $id;
    //     dd($this->listaproductos);
    //     logger($this->listaproductos);
    // }

    public function edit($id){
        // Obtenemos los datos del pedido
        $pedido = Pedido::find($id);
        $this->pedido_id = $pedido->id;
        $this->obtenerDatos($id);
        $this->view ='pedido.edit';
    }

    // Funcion que actualiza el producto
    public function update(){
        // Validamos los campos
        $this->validate([
            'estado' => 'required',

        ]);

        try {

            $pedido = Pedido::find($this->pedido_id);
            $pedido->update([
                'estado' => $this->estado,

            ]);
        } catch (Throwable $e) {
            // Mostramos un mensaje de error
            if(config('app.locale')  == 'es'){
                session()->flash('error', 'Error al crear el pedido.');
            } else {
                session()->flash('error', 'Error to created Order.');
            }
            return redirect()->to('/admin/pedidos');
        }

        $this->default();

        $this->enviarEmail($this->pedido_id);

        if(config('app.locale')  == 'es'){
            session()->flash('message', 'Pedido actualizado corréctamente.');
        } else {
            session()->flash('message', 'Pedido updated correctly.');
        }

        return redirect()->to('/admin/pedidos');
    }

    // Funcion para confirmar el borrado de un pedido
    public function confirmDelete($id)
    {
        $this->confirming = $id;
    }
    // Funcion para confirmar el envio de correo
    public function confirmEmail($id)
    {
        $this->confiremail = $id;
    }

    // Funcion para denegar la eliminacion del pedido
    public function noeliminar(){
        $this->confirming = "";
    }
    // Funcion para denegar el envio de correo
    public function noenviar(){
        $this->confiremail = "";
    }
    // Funcion para emviar el codigo de seguimiento por email
    public function enviarEmail($id){
        $this->obtenerDatos($id);
        //Enviar email con codigo de seguimiento
        $lineas = $this->pedido->lineaspedido;
        $usuario = $this->pedido->usuario;
        $correo = new ContactoEmail($this->pedido, $this->direccion, $lineas,$usuario);
        Mail::to($this->email)->send($correo);

        $this->default();

        if(config('app.locale')  == 'es'){
            session()->flash('message', 'Correo enviado corréctamente.');
        } else {
            session()->flash('message', 'Email send correctly.');
        }

        return redirect()->to('/admin/pedidos');

    }

    // Funcion que destruye un pedido
    public function destroy($id)
    {
        DB::table('pedidos')->where('id', '=', $id)->delete();

        $this->default();

        // Enviamos mensaje de confirmacion
        if(config('app.locale')  == 'es'){
            session()->flash('eliminado', 'Pedido con ID: ' . $id . ' eliminado.');
        } else {
            session()->flash('eliminado', 'Order with ID: ' . $id . ' removed.');
        }

        return redirect()->to('/admin/pedidos');
    }

    // Funcion para revisar toda la info del pedido
    public function revisar($id){
        // Obtenemos los datos del pedido
        $this->obtenerDatos($id);
        $this->view = 'pedido.view';
    }

    // Obtener datos del pedido seleccionado
    public function obtenerDatos($id){
        $this->pedido = Pedido::find($id);
        // Obtenemos los datos del pedido para verlos en el form
        $this->pedido_id = $this->pedido->id;
        $this->ref = $this->pedido->ref;
        $this->estado = $this->pedido->estado;
        $this->total = $this->pedido->total;
        $this->observaciones = $this->pedido->observaciones;
        $this->pago = $this->pedido->pago;

        // Obtenemos las lineas del pedido
        $this->lineaspedidos = $this->pedido->lineaspedido;

        // Obtenenos el pedido del pedido
        $this->usuario = $this->pedido->usuario;
        $this->name = $this->usuario->name;
        $this->email = $this->usuario->email;
        $this->telefono = $this->usuario->telefono;


        // Comprobamos si el pedido tiene direccion
        $idDireccion = $this->usuario->direccion;
        if(isset($idDireccion)){
            $this->direccion = Direccion::find($idDireccion->direccion_id);

            $this->tipo_via = $this->direccion->tipo_via;
            $this->nombre_via = $this->direccion->nombre_via;
            $this->numero = $this->direccion->numero;
            $this->planta = $this->direccion->planta;
            $this->puerta = $this->direccion->puerta;
            $this->localidad = $this->direccion->localidad;
            $this->provincia = $this->direccion->provincia;
            $this->codigo_postal = $this->direccion->codigo_postal;
            $this->pais = $this->direccion->pais;
            $this->dni = $this->direccion->dni;

        }

    }

    // Funcion para restear el search
    public function clear(){
        $this->search = '';
        $this->paginate = '5';
        $this->page = 1;
    }


    // Funcion que limpia los campos y vueve al from de creacion
    public function default(){

        $this->total ='';
        $this->estado ='';
        $this->seguimiento = '';
        $this->observaciones = '';
        $this->pago = '';
        $this->ref = '';
        $this->tipo_via = '';
        $this->nombre_via = '';
        $this->numero = '';
        $this->planta = '';
        $this->puerta = '';
        $this->localidad = '';
        $this->provincia = '';
        $this->codigo_postal = '';
        $this->pais = '';
        $this->cantidadLinea = '';
        $this->subtotal = '';
        $this->view = 'pedido.create';

    }












}
