
<div class="card card-custom mt-5">
    <div class="card-header">
     <h3 class="card-title">
        @lang('web.form_nuevo_fabricante')
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
                    <label class="block font-medium text-sm text-gray-700" for="web" >Web</label>
                    <input type="text" id="web" class="form-control  @error('web') is-invalid @enderror" wire:model="web">
                    @error('web')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="block font-medium text-sm text-gray-700" for="email" >Email</label>
                    <input type="text" id="email" class="form-control  @error('email') is-invalid @enderror" wire:model="email">
                    @error('email')
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
            </div>
            <div class="col-12 col-md-6">
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













