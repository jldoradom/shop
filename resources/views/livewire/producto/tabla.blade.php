 <div class="">
    <!--begin::Card-->
    <div class="card card-custom">
        <div class="">
            <!--begin: Datatable-->
            </div class="datatable datatable-bordered datatable-head-custom datatable-default datatable-primary datatable-loaded">
            <div class="card card-custom">
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">@lang('web.admin_header_productos')
                        <span class="text-muted pt-2 font-size-sm d-block">Productos</span></h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-7">
                        <div class="row align-items-center">
                            <div class="col-lg-9 col-xl-8">
                                <div class="row align-items-center">
                                    <div class="col-md-3 my-2 my-md-0">
                                        <div class="input-icon">
                                            <input wire:model="search" id="busqueda" type="text" class="form-control" placeholder="Buscar...">
                                            <span>
                                                <i class="flaticon2-search-1 text-muted"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 my-2 my-md-0">
                                        <div class="input-icon">
                                            <input wire:model="search" id="busqueda" type="text" class="form-control" placeholder="Buscar...">
                                            <span>
                                                <i class="flaticon2-search-1 text-muted"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 my-2 my-md-0">
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
                                        <div class="col-md-3 my-2 my-md-0">
                                            <div class="d-flex align-items-center">
                                                <button wire:click="clear" class="btn btn-secondary">X</button>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">

                            </div>
                        </div>
                        @if (session()->has('eliminado'))
                            <div class="alert alert-success mt-4">
                                {{ session('eliminado') }}
                            </div>
                        @endif
                    </div>
                    <!--begin: Datatable-->

                    <div id="kt_datatable_2_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12">
                        @if($productos->count())
                        <table class="table table-separate table-head-custom table-checkable dataTable no-footer dtr-inline"  role="grid" aria-describedby="" style="width: 1231px;">
                            <thead>
                                <tr role="row"><th class="dt-left sorting_disabled" rowspan="1" colspan="1" style="width: 30px;" aria-label="">
                                    <label class="checkbox checkbox-single">
                                        <input type="checkbox" value="" class="group-checkable">
                                        <span></span>
                                        </label>
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_2" rowspan="1" colspan="1" style="width: 45px;" aria-sort="descending" aria-label="">ID</th>
                                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_2" rowspan="1" colspan="1" style="width: 65px;" aria-label="">@lang('web.nombre')</th>
                                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_2" rowspan="1" colspan="1" style="width: 81px;" aria-label="">@lang('web.descripcion')</th>
                                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_2" rowspan="1" colspan="1" style="width: 87px;" aria-label="">@lang('web.precio')</th>
                                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_2" rowspan="1" colspan="1" style="width: 72px;" aria-label="">@lang('web.publicado')</th>
                                    {{-- <th class="sorting" tabindex="0" aria-controls="kt_datatable_2" rowspan="1" colspan="1" style="width: 116px;" aria-label="">Company Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_2" rowspan="1" colspan="1" style="width: 47px;" aria-label="">Ship Date</th>
                                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_2" rowspan="1" colspan="1" style="width: 75px;" aria-label="">Status</th>
                                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_2" rowspan="1" colspan="1" style="width: 75px;" aria-label="">Type</th> --}}
                                    <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 125px;" aria-label="">Accciones</th></tr>
                            </thead>
                            <tbody>
                                @foreach($productos as $producto)
                                    <tr role="row" class="odd">
                                        <td class="dt-left dtr-control" tabindex="0">
                                            <label class="checkbox checkbox-single">
                                                <input type="checkbox" value="" class="checkable">
                                                <span></span>
                                            </label>
                                        </td>
                                        <td class="sorting_1">{{ $producto->id }}</td>
                                        <td>{{ $producto->nombre }}</td>
                                        <td>{{ $producto->descripcion }}</td>

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
                                        <td nowrap="nowrap">
                                            <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2" title="Editar" wire:click="$emit('editar', {{$producto->id}})">
                                                <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-09-29-132851/theme/html/demo1/dist/../src/media/svg/icons/Design/Edit.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
                                                        <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
                                                    </g>
                                                </svg><!--end::Svg Icon--></span>
                                            </a>
                                            <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Ver" wire:click="$emit('view', {{$producto->id}})">
                                                <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-09-29-132851/theme/html/demo1/dist/../src/media/svg/icons/General/Visible.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path d="M3,12 C3,12 5.45454545,6 12,6 C16.9090909,6 21,12 21,12 C21,12 16.9090909,18 12,18 C5.45454545,18 3,12 3,12 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                        <path d="M12,15 C10.3431458,15 9,13.6568542 9,12 C9,10.3431458 10.3431458,9 12,9 C13.6568542,9 15,10.3431458 15,12 C15,13.6568542 13.6568542,15 12,15 Z" fill="#000000" opacity="0.3"/>
                                                    </g>
                                                </svg><!--end::Svg Icon--></span>
                                            </a>
                                            <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Publicar en web" wire:click="cambiarEstado({{ $producto->id }})">
                                                <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-09-29-132851/theme/html/demo1/dist/../src/media/svg/icons/Shopping/Price1.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                                        <path d="M3.52270623,14.028695 C2.82576459,13.3275941 2.82576459,12.19529 3.52270623,11.4941891 L11.6127629,3.54050571 C11.9489429,3.20999263 12.401513,3.0247814 12.8729533,3.0247814 L19.3274172,3.0247814 C20.3201611,3.0247814 21.124939,3.82955935 21.124939,4.82230326 L21.124939,11.2583059 C21.124939,11.7406659 20.9310733,12.2027862 20.5869271,12.5407722 L12.5103155,20.4728108 C12.1731575,20.8103442 11.7156477,21 11.2385688,21 C10.7614899,21 10.3039801,20.8103442 9.9668221,20.4728108 L3.52270623,14.028695 Z M16.9307214,9.01652093 C17.9234653,9.01652093 18.7282432,8.21174298 18.7282432,7.21899907 C18.7282432,6.22625516 17.9234653,5.42147721 16.9307214,5.42147721 C15.9379775,5.42147721 15.1331995,6.22625516 15.1331995,7.21899907 C15.1331995,8.21174298 15.9379775,9.01652093 16.9307214,9.01652093 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                    </g>
                                                </svg><!--end::Svg Icon--></span>
                                            </a>
                                            @if($confirming===$producto->id)
                                                <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Eliminar Definitívamente" wire:click="$emit('eliminar', {{$producto->id}})">
                                                    <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-09-29-132851/theme/html/demo1/dist/../src/media/svg/icons/Code/Done-circle.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"/>
                                                            <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                                                            <path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z" fill="#000000" fill-rule="nonzero"/>
                                                        </g>
                                                    </svg><!--end::Svg Icon--></span>
                                                </a>
                                                <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="No Eliminar" wire:click="noeliminar()">
                                                    <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-09-29-132851/theme/html/demo1/dist/../src/media/svg/icons/Code/Error-circle.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"/>
                                                            <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                                                            <path d="M12.0355339,10.6213203 L14.863961,7.79289322 C15.2544853,7.40236893 15.8876503,7.40236893 16.2781746,7.79289322 C16.6686989,8.18341751 16.6686989,8.81658249 16.2781746,9.20710678 L13.4497475,12.0355339 L16.2781746,14.863961 C16.6686989,15.2544853 16.6686989,15.8876503 16.2781746,16.2781746 C15.8876503,16.6686989 15.2544853,16.6686989 14.863961,16.2781746 L12.0355339,13.4497475 L9.20710678,16.2781746 C8.81658249,16.6686989 8.18341751,16.6686989 7.79289322,16.2781746 C7.40236893,15.8876503 7.40236893,15.2544853 7.79289322,14.863961 L10.6213203,12.0355339 L7.79289322,9.20710678 C7.40236893,8.81658249 7.40236893,8.18341751 7.79289322,7.79289322 C8.18341751,7.40236893 8.81658249,7.40236893 9.20710678,7.79289322 L12.0355339,10.6213203 Z" fill="#000000"/>
                                                        </g>
                                                    </svg><!--end::Svg Icon--></span>
                                                </a>
                                            @else
                                                <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Eliminar producto"  wire:click="confirmDelete({{ $producto->id }})">
                                                    <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-09-29-132851/theme/html/demo1/dist/../src/media/svg/icons/Home/Trash.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"/>
                                                            <path d="M6,8 L18,8 L17.106535,19.6150447 C17.04642,20.3965405 16.3947578,21 15.6109533,21 L8.38904671,21 C7.60524225,21 6.95358004,20.3965405 6.89346498,19.6150447 L6,8 Z M8,10 L8.45438229,14.0894406 L15.5517885,14.0339036 L16,10 L8,10 Z" fill="#000000" fill-rule="nonzero"/>
                                                            <path d="M14,4.5 L14,3.5 C14,3.22385763 13.7761424,3 13.5,3 L10.5,3 C10.2238576,3 10,3.22385763 10,3.5 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>
                                                        </g>
                                                    </svg><!--end::Svg Icon--></span>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
                @else
                    <div class="bg-white px4 py-3 border-t border-gray-200 sm:px-6 text-gray-500">
                        @lang('web.no_resultados') "{{ $search }}" @lang('web.en_la_pagina') {{ $page }} @lang('web.al_mostrar')  {{ $paginate }}
                    </div>
                @endif
            </div>
            {{-- <div class="row">
                <div class="col-sm-12 col-md-5">
                    <div class="dataTables_info" id="kt_datatable_2_info" role="status" aria-live="polite">Showing 1 to 10 of 50 entries</div>
                </div>
                <div class="col-sm-12 col-md-7 dataTables_pager">
                    <div class="dataTables_length" id="kt_datatable_2_length">
                        <label>Display <select name="kt_datatable_2_length" aria-controls="kt_datatable_2" class="custom-select custom-select-sm form-control form-control-sm">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                            </select>
                        </label>
                    </div>
                    <div class="dataTables_paginate paging_simple_numbers" id="kt_datatable_2_paginate">
                        <ul class="pagination"><li class="paginate_button page-item previous disabled" id="kt_datatable_2_previous">
                            <a href="#" aria-controls="kt_datatable_2" data-dt-idx="0" tabindex="0" class="page-link">
                                <i class="ki ki-arrow-back"></i></a></li>
                                <li class="paginate_button page-item active">
                                    <a href="#" aria-controls="kt_datatable_2" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                                </li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="kt_datatable_2" data-dt-idx="2" tabindex="0" class="page-link">2</a>
                                </li><li class="paginate_button page-item "><a href="#" aria-controls="kt_datatable_2" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="kt_datatable_2" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="kt_datatable_2" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item next" id="kt_datatable_2_next"><a href="#" aria-controls="kt_datatable_2" data-dt-idx="6" tabindex="0" class="page-link"><i class="ki ki-arrow-next"></i></a></li></ul></div></div></div></div>
                    <!--end: Datatable-->
                </div>
            </div> --}}
            <!--------- Insertar paginacion  --------------->
            <div class="mt-3">
                {{ $productos->links() }}
            </div>
            </div>
            <!--end: Datatable-->
        </div>
    </div>
    <!--end::Card-->
</div>


<!-- Fin de elemento nuevo -->



