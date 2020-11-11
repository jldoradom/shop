<div class="card card-custom mt-5">
    <div class="card-header">
     <h3 class="card-title">
        @lang('web.formulario_para_añadir_un_nuevo_producto')
     </h3>
    </div>
    <!--begin::Form-->
    <div class="m-4">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </div>
    <form wire:submit.prevent="update">
     <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label  for="nombre">@lang('web.nombre')</label>
                    <input type="text" id="nombre" class="form-control @error('nombre') is-invalid @enderror" wire:model="nombre">
                    @error('nombre')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>


                <div class="form-group">
                    <label class="block font-medium text-sm text-gray-700" for="descripcion">@lang('web.descripcion')</label>
                    <textarea id="descripcion"  class="form-control  @error('descripcion') is-invalid @enderror" wire:model="descripcion">
                    </textarea>
                    @error('descripcion')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="block font-medium text-sm text-gray-700" for="precio" >@lang('web.precio')</label>
                    <input type="text" id="precio" class="form-control  @error('precio') is-invalid @enderror" wire:model="precio">
                    @error('precio')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="block font-medium text-sm text-gray-700" for="imagenes">Galería</label>
                    @for($i = 0; $i < $camposImagenes; $i++)
                        <input type="file" id="imagenes" class="form-control  mb-3 mt-3 @error('imagenes') is-invalid @enderror"  wire:change="$emit('file_upload_start')">
                        @error('imagenes')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    @endfor
                    <div>
                        <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent
                        rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none
                        focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" href="#" wire:click.prevent="handleAddField">@lang('web.añadir_imagen')</a>
                    </div>
                </div>
                @if(count($imagenesgaleria) > 0 )
                <label class="block font-medium text-sm text-gray-700" for="imagenes">Imagenes de la galería:</label>
                    <div class="form-group mb-1">
                    @foreach($imagenesgaleria as $imagen)
                            <ul>
                                <li class="enlaceImagen">
                                    <a target="_blank" href="{{ 'storage/galeria/'.$imagen->id_producto.'/'.$imagen->filename }}">{{ $imagen->filename }}</a>
                                    <button href="#" wire:click="eliminarImagen({{$imagen->id}})" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent
                                            rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700
                                            focus:shadow-outline-red active:bg-red-600 transition ease-in-out duration-150">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                    </button>
                                </li>
                            </ul>
                    @endforeach
                    </div>
                @endif
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label  for="codigo">@lang('web.codigo')</label>
                    <input type="text" id="codigo" class="form-control @error('codigo') is-invalid @enderror" wire:model="codigo">
                    @error('codigo')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="fabricante_id">@lang('web.fabricante')</label>
                    <select wire:model="fabricante_id"  class="form-control @error('fabricante_id') is-invalid @enderror" id="fabricante_id">
                        <option value="" selected disabled>@lang('web.seleccione')</option>
                        @foreach($fabricantes as $fabricante)
                            <option  value="{{ $fabricante->id }}">{{ $fabricante->nombre }}</option>
                        @endforeach
                    </select>
                    @error('fabricante_id')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="categoria_id">@lang('web.categoria')</label>
                    <select wire:model="categoria_id" class="form-control @error('categoria_id') is-invalid @enderror" id="categoria_id" >
                        <option value="" selected disabled>@lang('web.seleccione')</option>
                        @foreach($categorias as $categoria)
                            <option  value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                    @error('categoria_id')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="categoria_web">@lang('web.categoria_web')</label>
                    <select wire:model="categoria_web" class="form-control @error('categoria_web') is-invalid @enderror" id="categoria_web" >
                        <option value="" selected disabled>@lang('web.seleccione')</option>
                        <option value="normal">@lang('web.normal')</option>
                        <option value="destacado">@lang('web.destacado')</option>
                        <option value="rebajado">@lang('web.rebajado')</option>
                    </select>
                    @error('categoria_web')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </form>
    <div class="card-footer d-flex">
        <button class="btn btn-primary mr-2" wire:click="store">
            @lang('web.guardar')
        </button>
     </div>
    <!--end::Form-->
   </div>













