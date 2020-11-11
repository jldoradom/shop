<div class="row">
    <div class="col-12 col-xl-5">
        <div class="card card-custom mt-5">
            <div class="card-header">
                <h3 class="card-title">
                    @lang('web.info_user')
                </h3>
            </div>
            <div class="card-body">
                <div class="">
                    <div class="">
                        <div id="kt_datatable_2_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <table class="table table-separate table-head-custom dataTable no-footer dtr-inline"  role="grid" aria-describedby="" style="width: 1231px;">
                            <thead>
                            <tr role="row">
                                <th class="px-6 py-3 bg-gray-50 text-left  leading-4 font-medium text-gray-500 uppercase tracking-wider" tabindex="0" aria-controls="kt_datatable_2" rowspan="1" colspan="1" style="width: 45px;" aria-sort="descending" aria-label="">
                                    <span class="ml-3">@lang('web.dato')</span>
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left  leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    @lang('web.contenido')
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-3 bg-gray-50 text-left  leading-4 font-medium text-gray-500 uppercase tracking-wider"><span class="ml-3">ID</span></td>
                                    <td class=""><span class="ml-3">{{ $user_id }}</span></td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-3 bg-gray-50 text-left  leading-4 font-medium text-gray-500 uppercase tracking-wider"><span class="ml-3">@lang('web.nombre')</span></td>
                                    <td class=""><span class="ml-3">{{ $name }}</span></td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-3 bg-gray-50 text-left  leading-4 font-medium text-gray-500 uppercase tracking-wider"><span class="ml-3">Email</span></td>
                                    <td class=""><div class="leading-5 text-gray-900 ml-3">{{ $email }}</div></td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-3 bg-gray-50 text-left  leading-4 font-medium text-gray-500 uppercase tracking-wider"><span class="ml-3">@lang('web.telefono')</span></td>
                                    <td class=""><div class="leading-5 text-gray-900 ml-3">{{ $telefono }}</div></td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-3 bg-gray-50 text-left  leading-4 font-medium text-gray-500 uppercase tracking-wider"><span class="ml-3">Rol</span></td>
                                    <td class=""><div class="leading-5 text-gray-900 ml-3">{{ $rol }}</div></td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-3 bg-gray-50 text-left  leading-4 font-medium text-gray-500 uppercase tracking-wider"><span class="ml-3">DNI</span></td>
                                    <td class=""><div class="leading-5 text-gray-900 ml-3">{{ $dni }}</div></td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-3 bg-gray-50 text-left  leading-4 font-medium text-gray-500 uppercase tracking-wider"><span class="ml-3">@lang('web.direccion')</span></td>
                                    <td class=""><div class="leading-5 text-gray-900 ml-3">
                                    <ul>
                                       <li>@lang('web.nombre_via'): {{ $nombre_via }}<br></li>
                                       <li>@lang('web.numero'): {{ $numero }}<br></li>
                                       <li>@lang('web.planta'): {{ $planta }}<br></li>
                                       <li>@lang('web.puerta'): {{ $puerta }}<br></li>
                                       <li>@lang('web.localidad'): {{ $localidad }}<br></li>
                                       <li>@lang('web.provincia'): {{ $provincia }}<br></li>
                                       <li>@lang('web.pais'): {{ $pais }}<br></li>
                                       <li>@lang('web.codigo_postal'): {{ $codigo_postal }}</li>
                                    </ul>
                                    </div></td>
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
                    </span>@lang('web.nuevo_usuario')
                </button>
            </div>
        </div>
    </div>

    <div class="col-12 col-xl-7">
        <div class="">
            <!--begin::List Widget 10-->
            <div class="card card-custom card-stretch gutter-b mt-5">
                <!--begin::Header-->
                <div class="card-header">
                    <h3 class="card-title">
                        @lang('web.pedidos')
                    </h3>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Item-->
                    @if(count($pedidos) > 0 and $viewpedido == false)
                        @foreach ($pedidos as $pedido)
                            <div class="mb-6">
                                <!--begin::Content-->
                                <div class="d-flex align-items-center flex-grow-1">
                                    <!--begin::Section-->
                                    <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                                        <!--begin::Info-->
                                        <div class="d-flex flex-column align-items-cente py-2 w-50">
                                            <!--begin::Title-->
                                            <a href="#" wire:click="viewpedido({{ $pedido->id }})" class="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1">Ref: {{ $pedido->ref }}</a>
                                            <!--end::Title-->

                                            <!--begin::Data-->
                                            <span class="text-muted font-weight-bold">@lang('web.fecha'): {{ $pedido->created_at }}</span>
                                            <!--end::Data-->
                                        </div>
                                        <div class="d-flex flex-column align-items-cente py-2">
                                            <!--begin::Title-->
                                            <p href="#" class="text-dark-75 font-weight-bold  font-size-lg mb-1">@lang('web.total_pedidos'): {{ $pedido->total }}</p>
                                            <!--end::Title-->

                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Label-->
                                        <span class="label label-lg label-light-primary label-inline font-weight-bold py-4">{{ $pedido->estado }}</span>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Section-->

                                </div>
                                <!--end::Content-->
                            </div>
                        @endforeach
                        <p class="text-dark-75 font-weight-bold  font-size-lg mb-1">@lang('web.total_gastado'): <span class="label label-lg label-light-primary label-inline font-weight-bold py-4"> {{ $totalpedidos }}</span></p>
                    @elseif(count($pedidos) > 0 and $viewpedido == true)
                        <div id="" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    @if($lineaspedidos->count() > 0)
                                        <table class="table table-separate table-head-custom table-checkable dataTable no-footer dtr-inline"  role="grid" aria-describedby="" style="width: 1231px;">
                                            <thead>
                                                <tr role="row">
                                                <th class="sorting" tabindex="0" aria-controls="kt_datatable_2" rowspan="1" colspan="1" style="width: 45px;" aria-sort="descending" aria-label="">@lang('web.producto')</th>
                                                <th class="sorting" tabindex="0" aria-controls="kt_datatable_2" rowspan="1" colspan="1" style="width: 65px;" aria-label="">@lang('web.cantidad')</th>
                                                <th class="sorting" tabindex="0" aria-controls="kt_datatable_2" rowspan="1" colspan="1" style="width: 87px;" aria-label="">@lang('web.precio')</th>
                                                <th class="sorting" tabindex="0" aria-controls="kt_datatable_2" rowspan="1" colspan="1" style="width: 87px;" aria-label=""> @lang('web.total')</th>
                                            </thead>
                                                <tbody>
                                                    @foreach($lineaspedidos as $lineaspedido)
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1">{{ $lineaspedido->producto->nombre }}</td>
                                                            <td>{{ $lineaspedido->cantidad }}</td>
                                                            <td>{{ $lineaspedido->producto->precio }}</td>
                                                            <td><span class="label label-lg label-light-primary label-inline font-weight-bold py-4">{{ $lineaspedido->subtotal }}</span></td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                        </table>
                                            <p href="#" class="text-dark-75 font-weight-bold  font-size-lg mb-1">@lang('web.ref_pedido'): {{ $pedido->ref }}</p>
                                            <p href="#" class="text-dark-75 font-weight-bold  font-size-lg mb-1">@lang('web.total_pedidos'):
                                                <span class="label label-lg label-light-primary label-inline font-weight-bold py-4">{{ $pedido->total }}</span></p>
                                    @else
                                        <div  class="bg-white px4 py-3  border-gray-200 sm:px-6 text-gray-500 min-width-message">
                                            <div class="">@lang('web.no_lineas')</div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="my-5">
                            <button  class="btn btn-primary font-weight-bolder d-flex" wire:click="backpedidos">
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
                                </span>@lang('web.volver_pedidos')
                            </button>
                        </div>
                    @else
                        <p class="mt-5">@lang('web.no_pedidos')</p>
                    @endif
                </div>
                <!--end: Card Body-->
            </div>
            <!--end: Card-->
            <!--end: List Widget 10-->
        </div>
    </div>
</div>




