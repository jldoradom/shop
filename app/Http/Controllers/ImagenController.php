<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImagenController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // leer la ruta imagen que devuelve al almacenar la imagen en storage/establecimientos
        $ruta_imagen = $request->file('file')->store('establecimientos', 'public');

        // Resize a la imagen
        $imagen = Image::make( public_path("storage/{$ruta_imagen}"))->fit(800, 450);
        $imagen->save();

        // Almacenar con modelo
        $imagenDB = new Imagen;
        $imagenDB->id_establecimiento = $request['uuid'];
        $imagenDB->ruta_imagen = $ruta_imagen;
        $imagenDB->save();

        // Devolver respuesta
        $respuesta = [
            'archivo' => $ruta_imagen
        ];
        // la devolvemos en formato json
        return response()->json($respuesta);

    }

    // Elimina una imagen de la db y del servidor
    public function destroy(Request $request){

        // Validacion
        $uuid = $request->get('uuid');
        $establecimiento = Producto::where('uuid', $uuid)->first();
        $this->authorize('delete', $establecimiento);
        // Imagen a eliminar
        $imagen = $request->get('imagen');

        $respuesta = [
            'imagen_eliminar' => $imagen
        ];

        if(File::exists('storage/' . $imagen)){
            // Elimina imagen del servidor
            File::delete('storage/' . $imagen);

            // Elimina imagen de la db
            Imagen::where('ruta_imagen', $imagen)->delete();

            // creamos la respuesta que se envia via json hacia el archivo dropzpne js
            $respuesta = [
                'mensaje' => 'Imagen Eliminada',
                'imagen' => $imagen,

            ];

        }



        return response()->json($respuesta);
    }
}
