
<div class="card card-custom mt-5">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">@lang('web.form_editar_usuarios')
            <span class="text-muted pt-2 font-size-sm d-block">@lang('web.form_editar_usuarios_sub')</span></h3>
        </div>
    </div>
    <!--begin::Form-->
    <div class="m-4">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <form wire:submit.prevent="update">
     <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label  for="name">@lang('web.nombre')</label>
                    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" wire:model="name">
                    @error('name')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label  for="email">@lang('web.nombre')</label>
                    <input type="text" id="email" class="form-control @error('email') is-invalid @enderror" wire:model="email">
                    @error('email')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="block font-medium text-sm text-gray-700" for="tipo_via" >@lang('web.tipo_via')</label>
                    <input type="text" id="tipo_via" class="form-control  @error('tipo_via') is-invalid @enderror" wire:model="tipo_via">
                    @error('tipo_via')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="block font-medium text-sm text-gray-700" for="nombre_via" >@lang('web.nombre_via')</label>
                    <input type="text" id="nombre_via" class="form-control  @error('nombre_via') is-invalid @enderror" wire:model="nombre_via">
                    @error('nombre_via')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="block font-medium text-sm text-gray-700" for="numero" >@lang('web.numero')</label>
                    <input type="text" id="numero" class="form-control  @error('numero') is-invalid @enderror" wire:model="numero">
                    @error('numero')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="block font-medium text-sm text-gray-700" for="planta" >@lang('web.planta')</label>
                    <input type="text" id="planta" class="form-control  @error('planta') is-invalid @enderror" wire:model="planta">
                    @error('planta')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="block font-medium text-sm text-gray-700" for="puerta" >@lang('web.puerta')</label>
                    <input type="text" id="puerta" class="form-control  @error('puerta') is-invalid @enderror" wire:model="puerta">
                    @error('puerta')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-md-6">


                <div class="form-group">
                    <label class="block font-medium text-sm text-gray-700" for="provincia" >@lang('web.provincia')</label>
                    <input type="text" id="provincia" class="form-control  @error('provincia') is-invalid @enderror" wire:model="provincia">
                    @error('provincia')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="block font-medium text-sm text-gray-700" for="codigo_postal" >@lang('web.codigo_postal')</label>
                    <input type="text" id="codigo_postal" class="form-control  @error('codigo_postal') is-invalid @enderror" wire:model="codigo_postal">
                    @error('codigo_postal')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="block font-medium text-sm text-gray-700" for="pais">@lang('web.pais')</label>
                    <input id="pais"  class="form-control  @error('pais') is-invalid @enderror" wire:model="pais">
                    @error('pais')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="block font-medium text-sm text-gray-700" for="telefono" >@lang('web.telefono')</label>
                    <input type="text" id="telefono" class="form-control  @error('telefono') is-invalid @enderror" wire:model="telefono">
                    @error('telefono')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="block font-medium text-sm text-gray-700" for="localidad" >@lang('web.localidad')</label>
                    <input type="text" id="localidad" class="form-control  @error('localidad') is-invalid @enderror" wire:model="localidad">
                    @error('localidad')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="block font-medium text-sm text-gray-700" for="dni" >DNI</label>
                    <input type="text" id="dni" class="form-control  @error('dni') is-invalid @enderror" wire:model="dni">
                    @error('dni')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="rol_id">Rol</label>
                    <select wire:model="rol_id" class="form-control @error('rol_id') is-invalid @enderror" id="rol_id" >
                        <option value="" selected disabled>@lang('web.seleccione')</option>
                        @foreach($roles as $rol)
                            <option  value="{{ $rol->id }}">{{ $rol->name }}</option>
                        @endforeach
                    </select>
                    @error('rol_id')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </form>
    <div class="card-footer d-flex">
        <button class="btn btn-primary mr-2" wire:click="update">
            @lang('web.guardar')
        </button>
     </div>
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
        </span>@lang('web.nuevo_usuario')
    </button>
</div>













