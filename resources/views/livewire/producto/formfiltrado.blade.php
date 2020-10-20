{{-- <h1 class="text-lg font-medium text-gray-900 mb-4">@lang('web.filtrado_de_productos')</h1> --}}
<!--begin::Card-->
<div class="card-header flex-wrap border-0 pt-6 pb-0">
    <div class="card-title">
        <h3 class="card-label">@lang('web.filtrado_de_productos')
        <span class="text-muted pt-2 font-size-sm d-block">Buscar productos por distintos parametros</span></h3>
    </div>
    <div class="card-toolbar">
        <!--begin::Button-->
        <a href="#" class="btn btn-primary font-weight-bolder">
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
        </span>Nuevo producto</a>
        <!--end::Button-->
    </div>
</div>
<!--end::Card-->
<div class="d-flex justify-between">
    {{-- <label for="busqueda" class="block text-sm leading-5 font-medium text-gray-700">@lang('web.busca_por_nombre')</label> --}}
    <input id="busqueda" class="form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5" wire:model="search" type="text" placeholder="Buscar...">
    <div class="form-input rounded-md shadow-sm ml-6 block">
        <select wire:model="paginate" class="outline-none text-gray-500 text-sm ">
            <option value="5">@lang('web.5_por_pagina')</option>
            <option value="10">@lang('web.10_por_pagina')</option>
            <option value="15">@lang('web.15_por_pagina')</option>
            <option value="25">@lang('web.25_por_pagina')</option>
            <option value="30">@lang('web.30_por_pagina')</option>
            <option value="35">@lang('web.35_por_pagina')</option>
        </select>
    </div>
    @if($search !== '')
        <button wire:click="clear" class="form-input rounded-md shadow-sm ml-6 block">X</button>
    @endif
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
    </div>
    <div class="form-group">
        <label for="busqueda" class="block font-medium text-sm text-gray-700">@lang('web.busca_por_nombre')</label>
        <input id="busqueda" class="form-control" wire:model="search" type="text" placeholder="">
    </div>
</div>
