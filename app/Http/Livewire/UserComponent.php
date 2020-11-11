<?php

namespace App\Http\Livewire;

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
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\direccion_user;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\FileHelperProvider;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;

class UserComponent extends Component
{


    use WithPagination;
    // Propiedades publicas de la clase
    public $user_id,$nombre,$search,$pais,$telefono,$web,$email,$direccion_id,$fabricante_id,$direccion,
    $tipo_via,$nombre_via,$numero,$planta,$puerta,$localidad,$provincia,$codigo_postal,$confirming,$name,
    $password,$password2,$rol_id=2,$rol,$totalpedidos,$viewpedido=false,$pedido,$dni;
    public $view = 'usuario.create';
    public $paginate = 5;
    public $lineaspedidos = [];
    public $roles = [];
    public $pedidos = [];
    public $listaproductos = [];

    protected $queryString = [
        'user_id' => ['except' => ''],
        'paginate' => ['except' => '5']

    ];

    protected $listeners = [
        'view',
        'editar',
        'eliminar',
        'verpedido'
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

    public function editar($id)
    {
       $this->edit($id);
    }

    public function verpedido($id)
    {
       $this->pedidos($id);
    }


    // Montamos los datos iniciales necesarios
    public function mount(){
        $this->roles = Role::all();
    }


    public function render()
    {

        return view('livewire.usuario.user-component', [
            'usuarios' => User::where('name', 'like' , '%'.$this->search.'%')
                                ->orwhere('email', 'like' , '%'.$this->search.'%')
                                ->orderBy('created_at', 'DESC')
                                ->paginate($this->paginate)
        ]);
    }
    // Funcion para obtener los pedido
    public function pedidos($id){
        $usuario = User::find($id);
        $this->pedidos = $usuario->pedidos;

        $this->totalpedidos = Pedido::where('user_id' , '=' , $id)->sum('total');
    }
    // Funcion para ver el detalle del pedido
    public function viewpedido($id){
        $this->viewpedido = true;
        $this->pedido = Pedido::find($id);
        $this->lineaspedidos = $this->pedido->lineaspedido;

        // Obtenemos la info de cada producto del pedido
        // foreach($this->lineaspedidos as $lineaspedido){
        //     $this->listaproductos = Producto::find($lineaspedido);
        // }

    }

      // Funcion para ver el detalle del pedido
      public function backpedidos(){
        $this->viewpedido = false;
    }


    public function store(){
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => 'required|string|min:8',
            'password2' => 'required|same:password',
            'pais' => 'required',
            'telefono' => 'required',
            'tipo_via' => 'required',
            'nombre_via' => 'required',
            'numero' => 'required',
            'planta' => 'required',
            'puerta' => 'required',
            'localidad' => 'required',
            'provincia' => 'required',
            'codigo_postal' => 'required',
            'dni' => 'required',
        ]);

        $validoDni = $this->validar_dni($this->dni);


        if(!$validoDni){
            // Mostramos un mensaje de
            if(config('app.locale')  == 'es'){
                session()->flash('error', 'Error dni no valido.');
            } else {
                session()->flash('error', 'Error not valid dni.');
            }
            return redirect()->to('/admin/users');
        }

        try{
            $this->direccion_id = Direccion::create([
                'tipo_via' => $this->tipo_via,
                'nombre_via' => $this->nombre_via,
                'numero' => $this->numero,
                'planta' => $this->planta,
                'puerta' => $this->puerta,
                'localidad' => $this->localidad,
                'provincia' => $this->provincia,
                'codigo_postal' => $this->codigo_postal,
                'pais' => $this->pais,
                'dni' => $this->dni,

            ]);



            $user =  User::create([
                'name' => $this->name,
                'email' => $this->email,
                'telefono' => $this->telefono,
                'password' => Hash::make($this->password)
            ]);

            role_user::create([
                'role_id' => 2,
                'user_id' => $user->id
            ]);


            direccion_user::create([
                'direccion_id' => $this->direccion_id->id,
                'user_id' => $user->id
            ]);

        } catch (Throwable $e){
            // Mostramos un mensaje de
            if(config('app.locale')  == 'es'){
                session()->flash('error', 'Error al crear el usuario.');
            } else {
                session()->flash('error', 'Error to created User.');
            }
            return redirect()->to('/admin/users');

        }


        $this->default();

        if(config('app.locale')  == 'es'){
            session()->flash('message', 'Usuario creado corréctamente.');
        } else {
            session()->flash('message', 'User created correctly.');
        }

        return redirect()->to('/admin/users');


    }


    // Funcion para confirmar el borrado de un usuario
    public function confirmDelete($id)
    {
        $this->confirming = $id;
    }


    // Funcion que destruye un usuario
    public function destroy($id)
    {
        $usuario = User::find($this->user_id);
        $pivotDireccion = $usuario->direccion;
        if($pivotDireccion){
            DB::table('direccions')->where('id' , '=' , $pivotDireccion->direccion_id)->delete();
            DB::table('direccion_users')->where('user_id', '=', $id)->delete();
        }
        DB::table('users')->where('id', '=', $id)->delete();

        $this->default();

        // Enviamos mensaje de confirmacion
        if(config('app.locale')  == 'es'){
            session()->flash('eliminado', 'Usaurio con ID: ' . $id . ' eliminado.');
        } else {
            session()->flash('eliminado', 'User with ID: ' . $id . ' removed.');
        }

        return redirect()->to('/admin/users');



    }
    // Funcion para denegar la eliminacion del usuario
    public function noeliminar(){
        $this->confirming = "";

    }
    // Funcion para revisar toda la info del usuario
    public function revisar($id){
        // Obtenemos los datos del usuario
        $this->obtenerDatos($id);
        $this->pedidos($id);
        $this->view = 'usuario.view';
    }

    // Funcion para editar un usuario
    public function edit($id){

        // Obtenemos los datos del usuario
        $this->obtenerDatos($id);

        $this->view = 'usuario.edit';
    }
    // Funcion que actualiza el usuario
    public function update(){
        // Validamos los campos
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'pais' => 'required',
            'telefono' => 'required',
            'tipo_via' => 'required',
            'nombre_via' => 'required',
            'numero' => 'required',
            'planta' => 'required',
            'puerta' => 'required',
            'localidad' => 'required',
            'provincia' => 'required',
            'codigo_postal' => 'required',
            'dni' => 'required',
            'rol' => 'required'
        ]);


        $validoDni = $this->validar_dni($this->dni);

        if(!$validoDni){
            // Mostramos un mensaje de
            if(config('app.locale')  == 'es'){
                session()->flash('error', 'Error dni no válido.');
            } else {
                session()->flash('error', 'Error not valid dni.');
            }
            return redirect()->to('/admin/users');
        }

        try {

            $usuario = User::find($this->user_id);

            $usuario->forceFill([
                'name' => $this->name,
                'telefono' => $this->telefono,
                'email' => $this->email,
                'email_verified_at' => null,
                'password' => $this->password
            ])->save();

            // Comprobamos si el usuario tiene direccion
            $pivotDireccion = $usuario->direccion;
            if(isset($pivotDireccion)){

                // $idDireccion = direccion_user::whete('direccion_id','=',$pivotDireccion->direccion_id);

                $direccion = Direccion::find($pivotDireccion->direccion_id);

                $direccion->update([
                    'tipo_via' => $this->tipo_via,
                    'nombre_via' => $this->nombre_via,
                    'numero' => $this->numero,
                    'planta' => $this->planta,
                    'puerta' => $this->puerta,
                    'localidad' => $this->localidad,
                    'provincia' => $this->provincia,
                    'codigo_postal' => $this->codigo_postal,
                    'pais' => $this->pais,
                    'dni' => $this->dni,

                ]);

            } else { // Si no tiene la creamos

                $this->direccion_id = Direccion::create([
                    'tipo_via' => $this->tipo_via,
                    'nombre_via' => $this->nombre_via,
                    'numero' => $this->numero,
                    'planta' => $this->planta,
                    'puerta' => $this->puerta,
                    'localidad' => $this->localidad,
                    'provincia' => $this->provincia,
                    'codigo_postal' => $this->codigo_postal,
                    'pais' => $this->pais,
                    'dni' => $this->dni,
                ]);


                direccion_user::create([
                    'direccion_id' => $this->direccion_id->id,
                    'user_id' => $this->user_id
                ]);

            }

            // Actualizamos el rol del usuario
            if($this->rol_id){
                $role_user = Role_user::where('user_id' , '=' , $this->user_id);

                $role_user->update([
                    'role_id' => $this->rol_id
                ]);
            }


        } catch(Throwable $e){
            // Mostramos un mensaje de
            if(config('app.locale')  == 'es'){
                session()->flash('error', 'Error al editar el usuario.');
            } else {
                session()->flash('error', 'Error to edit User.');
            }
            return redirect()->to('/admin/users');

        }



        $this->default();

        if(config('app.locale')  == 'es'){
            session()->flash('message', 'Usuario actualizado corréctamente.');
        } else {
            session()->flash('message', 'User updated correctly.');
        }

        return redirect()->to('/admin/users');
    }

    // Obtener datos del usuariods seleccionado
    public function obtenerDatos($id){
        $usuario = User::find($id);
        // Obtenemos los datos del usuario para verlos en el form
        $this->user_id = $usuario->id;
        $this->name = $usuario->name;
        $this->email = $usuario->email;
        $this->password = $usuario->password;
        $this->telefono = $usuario->telefono;
        // Obtenenos el rol del usuario
        $rol_user = $usuario->rol;
        // dd($rol_user);
        $this->rol_id = $rol_user->role_id;
        $rolname = Role::find($this->rol_id);
        $this->rol = $rolname->name;
        // Comprobamos si el usuario tiene direccion
        $idDireccion = $usuario->direccion;
        if(isset($idDireccion)){
            $direccion = Direccion::find($idDireccion->direccion_id);

            $this->tipo_via = $direccion->tipo_via;
            $this->nombre_via = $direccion->nombre_via;
            $this->dni = $direccion->dni;
            $this->numero = $direccion->numero;
            $this->planta = $direccion->planta;
            $this->puerta = $direccion->puerta;
            $this->localidad = $direccion->localidad;
            $this->provincia = $direccion->provincia;
            $this->codigo_postal = $direccion->codigo_postal;
            $this->pais = $direccion->pais;
        }

    }
    // Funcion para validar el dni insertado
    public function validar_dni($dni){
        $letra = substr($dni, -1);
        $letra = strtoupper($letra);
        $numeros = substr($dni, 0, -1);
        settype($numeros, "integer");
        if(settype($numeros, "integer")){
            if ( substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros % 23, 1) == $letra && strlen($letra) == 1 && strlen ($numeros) == 8 ){
                return true;
            }else{
                return false;
            }
        }
        return false;
    }


    // Funcion que limpia los campos y vueve al from de creacion
    public function default(){

        $this->name ='';
        $this->password ='';
        $this->password2 ='';
        $this->pais = '';
        $this->telefono = '';
        $this->web = '';
        $this->email = '';
        $this->tipo_via = '';
        $this->nombre_via = '';
        $this->numero = '';
        $this->dni = '';
        $this->planta = '';
        $this->puerta = '';
        $this->localidad = '';
        $this->provincia = '';
        $this->codigo_postal = '';
        $this->view = 'usuario.create';

    }
}
