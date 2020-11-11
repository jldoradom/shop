{{-- <h1 class="text-lg font-medium text-gray-900 mb-4">Informacion del Producto</h1> --}}
<div class="card card-custom mt-5">
    <div class="card-header">
        <h3 class="card-title">
            @lang('web.info_fabricante')
        </h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div id="kt_datatable_2_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <table class="table table-separate table-head-custom table-checkable dataTable no-footer dtr-inline"  role="grid" aria-describedby="" style="width: 1231px;">
                    <thead>
                    <tr role="row">
                        <th class="px-6 py-3 bg-gray-50 text-left  leading-4 font-medium text-gray-500 uppercase tracking-wider" tabindex="0" aria-controls="kt_datatable_2" rowspan="1" colspan="1" style="width: 45px;" aria-sort="descending" aria-label="">
                            <span class="ml-3">@lang('web.dato')</span>
                        </th>
                        {{-- <th class="px-6 py-3 bg-gray-50 text-left  leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            @lang('web.dato')
                        </th> --}}
                        <th class="px-6 py-3 bg-gray-50 text-left  leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            @lang('web.contenido')
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-3 bg-gray-50 text-left  leading-4 font-medium text-gray-500 uppercase tracking-wider"><span class="ml-3">ID</span></td>
                            <td class=""><span class="ml-3">{{ $fabricante_id }}</span></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-3 bg-gray-50 text-left  leading-4 font-medium text-gray-500 uppercase tracking-wider"><span class="ml-3">@lang('web.nombre')</span></td>
                            <td class=""><span class="ml-3">{{ $nombre }}</span></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-3 bg-gray-50 text-left  leading-4 font-medium text-gray-500 uppercase tracking-wider"><span class="ml-3">@lang('web.pais')</span></td>
                            <td class=""><div class="leading-5 text-gray-900 ml-3">{{ $pais }}</div></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-3 bg-gray-50 text-left  leading-4 font-medium text-gray-500 uppercase tracking-wider"><span class="ml-3">@lang('web.telefono')</span></td>
                            <td class=""><div class="leading-5 text-gray-900 ml-3">{{ $telefono }}</div></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-3 bg-gray-50 text-left  leading-4 font-medium text-gray-500 uppercase tracking-wider"><span class="ml-3">@lang('web.direccion')</span></td>
                            <td class=""><div class="leading-5 text-gray-900 ml-3">
                              {{ $nombre_via }}
                              @lang('web.numero'): {{ $numero }}<br>
                              @lang('web.planta'): {{ $planta }}<br>
                              @lang('web.puerta'): {{ $puerta }}<br>
                              @lang('web.localidad'): {{ $localidad }}<br>
                              @lang('web.provincia'): {{ $provincia }}<br>
                              @lang('web.pais'): {{ $pais }}<br>
                              @lang('web.codigo_postal'): {{ $codigo_postal }}
                            </div></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-3 bg-gray-50 text-left  leading-4 font-medium text-gray-500 uppercase tracking-wider"><span class="ml-3">Web</span></td>
                            <td class=""><div class="leading-5 text-gray-900 ml-3">{{ $web }}</div></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-3 bg-gray-50 text-left  leading-4 font-medium text-gray-500 uppercase tracking-wider"><span class="ml-3">Email</span></td>
                            <td class=""><div class="leading-5 text-gray-900 ml-3">{{ $email }}</div></td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
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
            </span>@lang('web.nuevo_producto')
        </button>
    </div>
</div>
