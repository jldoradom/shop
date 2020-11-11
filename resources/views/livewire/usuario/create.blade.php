
<div class="card card-custom mt-5">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">@lang('web.form_nuevo_usuario')
            <span class="text-muted pt-2 font-size-sm d-block">@lang('web.form_nuevo_usuario_sub')</span></h3>
        </div>
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
    <form wire:submit.prevent="store">
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
                    <label class="block font-medium text-sm text-gray-700" for="email">Email</label>
                    <input id="email"  class="form-control  @error('email') is-invalid @enderror" wire:model="email">
                    @error('email')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="block font-medium text-sm text-gray-700" for="password2" >Password</label>
                    <input type="password" id="password2" class="form-control  @error('password2') is-invalid @enderror" wire:model="password2">
                    @error('password2')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="block font-medium text-sm text-gray-700" for="password">@lang('web.repita_password')</label>
                    <input type="password" id="password" class="form-control  @error('password') is-invalid @enderror" wire:model="password">
                    @error('password')
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
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label class="block font-medium text-sm text-gray-700" for="dni" >DNI</label>
                    <input type="text" id="dni" class="form-control  @error('dni') is-invalid @enderror" wire:model="dni">
                    @error('dni')
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













