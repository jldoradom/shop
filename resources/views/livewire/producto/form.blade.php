
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label class="block font-medium text-sm text-gray-700" for="nombre">@lang('web.nombre')</label>
            <input type="text" id="nombre" class="form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5 @error('nombre') is-invalid @enderror" wire:model="nombre">
            @error('nombre')
                <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label class="block font-medium text-sm text-gray-700" for="descripcion">@lang('web.descripcion')</label>
            <textarea id="descripcion"  class="form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5 @error('descripcion') is-invalid @enderror" wire:model="descripcion">
            </textarea>
            @error('descripcion')
                <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label class="block font-medium text-sm text-gray-700" for="precio" >@lang('web.precio')</label>
            <input type="text" id="precio" class="form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5 @error('precio') is-invalid @enderror" wire:model="precio">
            @error('precio')
                <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label class="block font-medium text-sm text-gray-700" for="stock">Stock</label>
            <input type="text" id="stock" class="form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5 @error('stock') is-invalid @enderror" wire:model="stock">
            @error('stock')
                <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label class="block font-medium text-sm text-gray-700" for="image">Imagen</label>
            <input type="file" id="image" class="form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5 @error('image') is-invalid @enderror" wire:model="image">
            @error('image')
                <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label class="block font-medium text-sm text-gray-700" for="imagenes">Galería</label>
            @for($i = 0; $i < $camposImagenes; $i++)
                <input type="file" id="imagenes" class="form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5 mb-3 mt-3 @error('imagenes') is-invalid @enderror"  wire:change="$emit('file_upload_start')">
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
        @if(isset($imagenes))
        <label class="block font-medium text-sm text-gray-700" for="imagenes">Imagenes de la galería:</label>
            <div class="form-group">
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

        {{-- <input wire:model="uuid" type="hidden" id="uuid" name="uuid" value="{{ Str::uuid()->toString() }}"> --}}
    </div>
    <div class="col-6">
        <p>Resto de campos</p>
    </div>
</div>
