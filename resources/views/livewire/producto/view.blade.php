<h1 class="text-lg font-medium text-gray-900 mb-4">Informacion del Producto</h1>

<div class="row">
    <div class="col-6">
        <div class="d-flex">
            <label class="block font-medium text-base text-gray-700 mr-4" >@lang('web.nombre'):</label>
            {{-- <input type="text" id="nombre" class="form-control " wire:model="nombre"> --}}
            <p class="block font-medium text-base text-gray-700">{{ $nombre }}</p>
        </div>
        <div class="d-flex">
            <label class="block font-medium text-base text-gray-700 mr-4" >@lang('web.descripcion'):</label>
            <p class="block font-medium text-base text-gray-700">{{ $descripcion }}</p>
        </div>
        <div class="d-flex">
            <label class="block font-medium text-base text-gray-700 mr-4"  >@lang('web.precio'):</label>
            <p class="block font-medium text-base text-gray-700">{{ $precio }}</p>
        </div>
        <div class="d-flex">
            <label class="block font-medium text-base text-gray-700 mr-4" >Stock:</label>
            <p class="block font-medium text-base text-gray-700">{{ $stock }}</p>
        </div>
    </div>
    <div class="col-6">
        <p>Resto de campos</p>
    </div>
</div>
