{{-- <form wire:submit.prevent="update">
    <h1 class="text-lg font-medium text-gray-900  mb-4">@lang('web.formulario_para_Editar_un_producto')</h1>
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        @if (session()->has('messageImagen'))
            <div class="alert alert-success">
                {{ session('messageImagen') }}
            </div>
        @endif
    </div>
    @include('livewire.producto.form')
</form> --}}



<div class="card card-custom mt-5">
    <div class="card-header">
        <h3 class="card-title">
            @lang('web.formulario_para_Editar_un_producto')
        </h3>
    </div>
    <!--begin::Form-->
    <form wire:submit.prevent="update">
        <div>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            @if (session()->has('messageImagen'))
                <div class="alert alert-success">
                    {{ session('messageImagen') }}
                </div>
            @endif
        </div>
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
                    focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" href="#" wire:click.prevent="handleAddField">Añadir Imagen</a>
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
            <p>Resto de campos</p>
        </div>
    </div>
     <div class="card-footer d-flex">
        <button class="btn btn-primary mr-2" wire:click="update">
                @lang('web.actualizar')
        </button>

     </div>
    </form>
    <!--end::Form-->
</div>
   <div class="container mb-5">
        <button  class="btn btn-primary font-weight-bolder d-flex" wire:click="default">
            <span class="svg-icon svg-icon-md">
                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"></rect>
                        <circle fill="#000000" cx="9" cy="15" r="6"></circle>
                        <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3"></path>
                    </g>
                </svg>
                <!--end::Svg Icon-->
            </span>Nuevo producto
        </button>
   </div>





{{-- <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent
rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none
 focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 mr-4" wire:click="update">
    @lang('web.actualizar')
</button> --}}
{{-- <div class="card-toolbar">
    <a href="#" class="btn btn-primary font-weight-bolder d-flex" wire:click="default">
        <span class="svg-icon svg-icon-md">
            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24"></rect>
                    <circle fill="#000000" cx="9" cy="15" r="6"></circle>
                    <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3"></path>
                </g>
            </svg>
            <!--end::Svg Icon-->
        </span>Nuevo producto
    </a>
</div> --}}
{{-- <button class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs
 text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300
  focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150 mt-2 mr-2" wire:click="default">
    @lang('web.limpiar_campos')
</button> --}}
