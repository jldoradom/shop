<h1 class="text-lg font-medium text-gray-900 mb-4">@lang('web.filtrado_de_productos')</h1>
<div class="d-flex justify-between">
    {{-- <label for="busqueda" class="block text-sm leading-5 font-medium text-gray-700">@lang('web.busca_por_nombre')</label> --}}
    <input id="busqueda" class="form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5" wire:model="search" type="text" placeholder="Buscar...">
    <div class="form-input rounded-md shadow-sm ml-6 block">
        <select wire:model="paginate" class="outline-none text-gray-500 text-sm ">
            <option value="5">5 por página</option>
            <option value="10">10 por página</option>
            <option value="15">15 por página</option>
            <option value="25">25 por página</option>
            <option value="30">30 por página</option>
            <option value="35">35 por página</option>
        </select>
    </div>
    @if($search !== '')
        <button wire:click="clear" class="form-input rounded-md shadow-sm ml-6 block">X</button>
    @endif
    {{-- <div class="form-group">
        <label for="busqueda" class="block font-medium text-sm text-gray-700">@lang('web.busca_por_nombre')</label>
        <input id="busqueda" class="form-control" wire:model="search" type="text" placeholder="">
    </div>
    <div class="form-group">
        <label for="busqueda" class="block font-medium text-sm text-gray-700">@lang('web.busca_por_nombre')</label>
        <input id="busqueda" class="form-control" wire:model="search" type="text" placeholder="">
    </div>
    <div class="form-group">
        <label for="busqueda" class="block font-medium text-sm text-gray-700">@lang('web.busca_por_nombre')</label>
        <input id="busqueda" class="form-control" wire:model="search" type="text" placeholder="">
    </div>
    <div class="form-group">
        <label for="busqueda" class="block font-medium text-sm text-gray-700">@lang('web.busca_por_nombre')</label>
        <input id="busqueda" class="form-control" wire:model="search" type="text" placeholder="">
    </div> --}}
</div>
