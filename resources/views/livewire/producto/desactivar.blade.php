
    <!--begin::Card-->
<div class="card card-custom">
    <div class="">
            <!--begin: Datatable-->
        <div class="datatable datatable-bordered datatable-head-custom datatable-default datatable-primary datatable-loaded">
            <div class="card card-custom">
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">@lang('web.seccion_productos')
                        <span class="text-muted pt-2 font-size-sm d-block">@lang('web.productos')</span></h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                    <div class="mb-7">
                        <div class="row align-items-center">
                            <div class="col-lg-9 col-xl-12">
                                <div class="row align-items-center">
                                    <div class="col-md-2 my-2 my-md-0">
                                        <div class="input-icon">
                                            <select wire:model="fabricante_id"    class="form-control" >
                                                @foreach($fabricantes as $fabricante)
                                                    <option  value="{{ $fabricante->id }}">{{ $fabricante->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 my-2 my-md-0">
                                        <div class="input-icon">
                                            <select wire:model="categoria_id"  class="form-control">
                                                <option value="" selected disabled>@lang('web.seleccione')</option>
                                                @foreach($categorias as $categoria)
                                                    <option  value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 my-2 my-md-0">
                                        <div class="d-flex align-items-center">
                                            <select wire:model="paginate" class="form-control" >
                                                <option value="5">@lang('web.5_por_pagina')</option>
                                                <option value="10">@lang('web.10_por_pagina')</option>
                                                <option value="15">@lang('web.15_por_pagina')</option>
                                                <option value="25">@lang('web.25_por_pagina')</option>
                                                <option value="30">@lang('web.30_por_pagina')</option>
                                                <option value="35">@lang('web.35_por_pagina')</option>
                                            </select>
                                        </div>
                                    </div>
                                    @if($search !== '')
                                        <div class="col-md-1 my-2 my-md-0">
                                            <div class="d-flex align-items-center">
                                                <button wire:click="clear" class="btn btn-secondary">X</button>
                                            </div>
                                        </div>
                                    @endif
                                    @if($productos->count() and $fabricante_id !== '')
                                        <div class="col-md-2 my-2 my-md-0">
                                            <div class="d-flex align-items-center">
                                                <button wire:click="desactivarProductosFabricante" class="btn btn-secondary">@lang('web.desactivar')</button>
                                            </div>
                                        </div>
                                    @endif
                                    @if($productos->count() and $categoria_id !== '')
                                        <div class="col-md-2 my-2 my-md-0">
                                            <div class="d-flex align-items-center">
                                                <button wire:click="desactivarProductosCategoria" class="btn btn-secondary">@lang('web.desactivar_categoria')</button>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                        </div>
                        @if (session()->has('desactivados'))
                            <div class="alert alert-success mt-4">
                                {{ session('desactivados') }}
                            </div>
                        @endif
                    </div>
                    <!--begin: Datatable-->

                    <div id="kt_datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-separate table-head-custom table-checkable dataTable no-footer dtr-inline" id="kt_datatable"  role="grid" aria-describedby="" style="width: 1231px;">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="kt_datatable_2" rowspan="1" colspan="1" style="width: 45px;" aria-sort="descending" aria-label="">ID</th>
                                            <th class="sorting" tabindex="0" aria-controls="kt_datatable_2" rowspan="1" colspan="1" style="width: 65px;" aria-label="">@lang('web.nombre')</th>
                                            <th class="sorting" tabindex="0" aria-controls="kt_datatable_2" rowspan="1" colspan="1" style="width: 87px;" aria-label="">@lang('web.precio')</th>
                                            <th class="sorting" tabindex="0" aria-controls="kt_datatable_2" rowspan="1" colspan="1" style="width: 72px;" aria-label="">@lang('web.publicado')</th>
                                            <th class="sorting" tabindex="0" aria-controls="kt_datatable_2" rowspan="1" colspan="1" style="width: 116px;" aria-label="">@lang('web.fabricante')</th>
                                            <th class="sorting" tabindex="0" aria-controls="kt_datatable_2" rowspan="1" colspan="1" style="width: 47px;" aria-label="">@lang('web.categoria')</th>
                                            <th class="sorting" tabindex="0" aria-controls="kt_datatable_2" rowspan="1" colspan="1" style="width: 75px;" aria-label="">@lang('web.codigo')</th>
                                            <th class="sorting" tabindex="0" aria-controls="kt_datatable_2" rowspan="1" colspan="1" style="width: 75px;" aria-label="">@lang('web.categoria_web')</th>
                                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 125px;" aria-label="">@lang('web.acciones')</th></tr>
                                    </thead>
                                @if($productos->count())
                                    <tbody>
                                    @foreach($productos as $producto)
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">{{ $producto->id }}</td>
                                            <td>{{ $producto->nombre }}</td>
                                            <td>
                                                <span class="label label-lg font-weight-bold label-light-primary label-inline">{{ $producto->precio }}</span>
                                            </td>
                                            <td>
                                                @if($producto->estado)

                                                    <span class="label label-success label-dot mr-2"></span><span class="font-weight-bold text-success">Online</span>
                                                @else

                                                    <span class="label label-danger label-dot mr-2"></span><span class="font-weight-bold text-danger">NO online</span>
                                                @endif

                                            </td>
                                            <td>{{ $producto->fabricante->nombre }}</td>
                                            <td>{{ $producto->categoria->nombre }}</td>
                                            <td>{{ $producto->codigo }}</td>
                                            <td>
                                                @if($producto->categoria_web === 'destacado')

                                                    <span class="label label-success label-dot mr-2"></span><span class="font-weight-bold text-success">{{ $producto->categoria_web }}</span>
                                                @else

                                                    <span class="label label-danger label-dot mr-2"></span><span class="font-weight-bold text-danger">{{ $producto->categoria_web }}</span>
                                                @endif

                                            </td>
                                            <td nowrap="nowrap">
                                                <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Publicar en web" wire:click="cambiarEstado({{ $producto->id }})">
                                                    <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-09-29-132851/theme/html/demo1/dist/../src/media/svg/icons/Shopping/Price1.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <polygon points="0 0 24 0 24 24 0 24"/>
                                                            <path d="M3.52270623,14.028695 C2.82576459,13.3275941 2.82576459,12.19529 3.52270623,11.4941891 L11.6127629,3.54050571 C11.9489429,3.20999263 12.401513,3.0247814 12.8729533,3.0247814 L19.3274172,3.0247814 C20.3201611,3.0247814 21.124939,3.82955935 21.124939,4.82230326 L21.124939,11.2583059 C21.124939,11.7406659 20.9310733,12.2027862 20.5869271,12.5407722 L12.5103155,20.4728108 C12.1731575,20.8103442 11.7156477,21 11.2385688,21 C10.7614899,21 10.3039801,20.8103442 9.9668221,20.4728108 L3.52270623,14.028695 Z M16.9307214,9.01652093 C17.9234653,9.01652093 18.7282432,8.21174298 18.7282432,7.21899907 C18.7282432,6.22625516 17.9234653,5.42147721 16.9307214,5.42147721 C15.9379775,5.42147721 15.1331995,6.22625516 15.1331995,7.21899907 C15.1331995,8.21174298 15.9379775,9.01652093 16.9307214,9.01652093 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                        </g>
                                                    </svg><!--end::Svg Icon--></span>
                                                </a>
                                                <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Cambiar estado web" wire:click="cambiarCategoriaWeb({{ $producto->id }})">
                                                    <span class="svg-icon svg-icon-primary svg-icon-2x">
                                                        <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-09-29-132851/theme/html/demo1/dist/../src/media/svg/icons/Shopping/Price1.svg-->
                                                        <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-09-29-132851/theme/html/demo1/dist/../src/media/svg/icons/Shopping/Sale2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <polygon fill="#000000" opacity="0.3" points="12 20.0218549 8.47346039 21.7286168 6.86905972 18.1543453 3.07048824 17.1949849 4.13894342 13.4256452 1.84573388 10.2490577 5.08710286 8.04836581 5.3722735 4.14091196 9.2698837 4.53859595 12 1.72861679 14.7301163 4.53859595 18.6277265 4.14091196 18.9128971 8.04836581 22.1542661 10.2490577 19.8610566 13.4256452 20.9295118 17.1949849 17.1309403 18.1543453 15.5265396 21.7286168"/>
                                                        <polygon fill="#000000" points="14.0890818 8.60255815 8.36079737 14.7014391 9.70868621 16.049328 15.4369707 9.950447"/>
                                                        <path d="M10.8543431,9.1753866 C10.8543431,10.1252593 10.085524,10.8938719 9.13585777,10.8938719 C8.18793881,10.8938719 7.41737243,10.1252593 7.41737243,9.1753866 C7.41737243,8.22551387 8.18793881,7.45690126 9.13585777,7.45690126 C10.085524,7.45690126 10.8543431,8.22551387 10.8543431,9.1753866" fill="#000000" opacity="0.3"/>
                                                        <path d="M14.8641422,16.6221564 C13.9162233,16.6221564 13.1456569,15.8535438 13.1456569,14.9036711 C13.1456569,13.9520555 13.9162233,13.1851857 14.8641422,13.1851857 C15.8138085,13.1851857 16.5826276,13.9520555 16.5826276,14.9036711 C16.5826276,15.8535438 15.8138085,16.6221564 14.8641422,16.6221564 Z" fill="#000000" opacity="0.3"/>
                                                    </g>
                                                </svg></span>
                                                </a>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                    @else
                                        <div class="bg-white px4 py-3 border-t border-gray-200 sm:px-6 text-gray-500 min-width-message">
                                            @lang('web.no_resultados')  @lang('web.en_la_pagina') {{ $page }} @lang('web.al_mostrar')  {{ $paginate }}
                                        </div>
                                        <div wire:loading class="bg-white px4 py-3  border-gray-200 sm:px-6 text-gray-500 min-width-message">
                                            <div class="">@lang('web.buscando')</div>
                                        </div>
                                    @endif

                                </table>
                            </div>
                        </div>
                    </div>
            <!--------- Insertar paginacion  --------------->
                    <div class="mt-3">
                        {{ $productos->links() }}
                </div>
            </div>
        </div>
    </div>
</div>



