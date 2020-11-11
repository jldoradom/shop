<?php

namespace App\Http\Livewire;

use App\Models\Imagen;
use Livewire\Component;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Direccion;
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

class FabricanteComponent extends Component
{
    use WithFileUploads;
    use WithPagination;
    // Propiedades publicas de la clase
    public $nombre,$search,$pais,$telefono,$web,$email,$direccion_id,$fabricante_id,$direccion,
    $tipo_via,$nombre_via,$numero,$planta,$puerta,$localidad,$provincia,$codigo_postal;
    public $view = 'fabricante.create';
    public $paginate = 5;


    protected $queryString = [
        'fabricante_id' => ['except' => ''],
        'paginate' => ['except' => '5']

    ];

    protected $listeners = [
        'view',
        'editar',
    ];

     // Funciones que escuchan eventos lanzados desde JS
     public function view($id)
     {
        $this->revisar($id);
     }

     public function editar($id)
     {
        $this->edit($id);
     }

     // Montamos los datos iniciales necesarios
     public function mount(){
        // $this->fabricantes = Fabricante::all();

    }

    public function render()
    {
        return view('livewire.fabricante.fabricante-component', [
            'fabricantes' => Fabricante::orderBy('created_at', 'DESC')
            ->paginate($this->paginate)
        ]);
    }

    // Funcion que almacena un fabricante
    public function store(){
        // Validamos los campos
        $this->validate([
            'nombre' => 'required',
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
            'web'  => 'required',
            'email'  => 'required|email|unique:App\Models\Fabricante,email',
        ]);

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
            ]);

            fabricante::create([
                'nombre' => $this->nombre,
                'telefono' => $this->telefono,
                'direccion_id' => $this->direccion_id->id,
                'web' => $this->email,
                'email' =>   $this->email,
            ]);

        } catch (Throwable $e) {
            // Mostramos un mensaje de error
            if(config('app.locale')  == 'es'){
                session()->flash('error', 'Error al crear el fabricante.');
            } else {
                session()->flash('error', 'Error to created company.');
            }
            return redirect()->to('/admin/pedidos');
        }

        $this->default();

        if(config('app.locale')  == 'es'){
            session()->flash('message', 'Fabricante creado corréctamente.');
        } else {
            session()->flash('message', 'Product created correctly.');
        }

        return redirect()->to('/admin/fabricantes');

    }

    // Funcion para editar un fabricante
    public function edit($id){
        // Obtenemos los datos del fabricante
        $this->obtenerDatos($id);

        $this->view = 'fabricante.edit';
    }
    // Funcion que actualiza el fabricante
    public function update(){
        // Validamos los campos
        $this->validate([
            'nombre' => 'required',
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
            'web'  => 'required',
            'email'  => 'required|email',

        ]);

        try{

            $fabricante = Fabricante::find($this->fabricante_id);

            // Creamos la nueva direccion
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
            ]);



            $fabricante->update([
                'nombre' => $this->nombre,
                'telefono' => $this->telefono,
                'direccion_id' => $this->direccion_id->id,
                'web' => $this->email,
                'email' =>   $this->email,
            ]);

        } catch (Throwable $e) {
            // Mostramos un mensaje de error
            if(config('app.locale')  == 'es'){
                session()->flash('error', 'Error al editar el fabricante.');
            } else {
                session()->flash('error', 'Error to updated company.');
            }
            return redirect()->to('/admin/pedidos');
        }


        $this->default();

        if(config('app.locale')  == 'es'){
            session()->flash('message', 'Fabricante actualizado corréctamente.');
        } else {
            session()->flash('message', 'Company updated correctly.');
        }

        return redirect()->to('/admin/fabricantes');
    }

    // Funcion para revisar toda la info del producto
    public function revisar($id){
        // Obtenemos los datos del fabricante
        $this->obtenerDatos($id);
        $this->view = 'fabricante.view';
    }

    // Obtener datos del fabricante seleccionado
    public function obtenerDatos($id){
        // Obtenemos los datos del fabricante para verlos en el form
        $fabricante = Fabricante::find($id);
        $this->fabricante_id = $fabricante->id;
        $this->nombre = $fabricante->nombre;
        $this->telefono = $fabricante->telefono;
        $this->direccion_id = $fabricante->direccion_id;
        $this->web = $fabricante->web;
        $this->email = $fabricante->email;
        // Obtenemos los datos de la direccion
        $direccion = Direccion::find($fabricante->direccion_id);
        $this->tipo_via = $direccion->tipo_via;
        $this->nombre_via = $direccion->nombre_via;
        $this->numero = $direccion->numero;
        $this->planta = $direccion->planta;
        $this->puerta = $direccion->puerta;
        $this->localidad = $direccion->localidad;
        $this->provincia = $direccion->provincia;
        $this->codigo_postal = $direccion->codigo_postal;
        $this->pais = $direccion->pais;


    }

    // Funcion que limpia los campos y vueve al from de creacion
    public function default(){

        $this->nombre ='';
        $this->pais = '';
        $this->telefono = '';
        $this->web = '';
        $this->email = '';
        $this->tipo_via = '';
        $this->nombre_via = '';
        $this->numero = '';
        $this->planta = '';
        $this->puerta = '';
        $this->localidad = '';
        $this->provincia = '';
        $this->codigo_postal = '';
        $this->view = 'fabricante.create';

    }
}
