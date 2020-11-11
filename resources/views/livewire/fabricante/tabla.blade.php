<div class="">
    <!--begin::Card-->
    <div class="card card-custom">
        <div class="">
            <!--begin: Datatable-->
            </div class="datatable datatable-bordered datatable-head-custom datatable-default datatable-primary datatable-loaded">
            <div class="card card-custom">
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">@lang('web.seccion_fabricantes')
                        <span class="text-muted pt-2 font-size-sm d-block">@lang('web.fabricante')</span></h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-7">
                        <div class="row align-items-center">
                            <div class="col-lg-9 col-xl-10">
                                <div class="row align-items-center">
                                    <div class="col-md-4 my-2 my-md-0">
                                        <div class="d-flex align-items-center">
                                            <select wire:model="paginate" class="form-control" >
                                                <option value="10">@lang('web.10_por_pagina')</option>
                                                <option value="15">@lang('web.15_por_pagina')</option>
                                                <option value="25">@lang('web.25_por_pagina')</option>
                                                <option value="30">@lang('web.30_por_pagina')</option>
                                                <option value="35">@lang('web.35_por_pagina')</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                            </div>
                        </div>
                    </div>
                    <!--begin: Datatable-->
                    <div id="" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                            <table class="table table-separate table-head-custom table-checkable dataTable no-footer dtr-inline"  role="grid" aria-describedby="" style="width: 1231px;">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting" tabindex="0" aria-controls="kt_datatable_2" rowspan="1" colspan="1" style="width: 45px;" aria-sort="descending" aria-label="">ID</th>
                                        <th class="sorting" tabindex="0" aria-controls="kt_datatable_2" rowspan="1" colspan="1" style="width: 65px;" aria-label="">@lang('web.nombre')</th>
                                        <th class="sorting" tabindex="0" aria-controls="kt_datatable_2" rowspan="1" colspan="1" style="width: 72px;" aria-label="">@lang('web.telefono')</th>
                                        <th class="sorting" tabindex="0" aria-controls="kt_datatable_2" rowspan="1" colspan="1" style="width: 47px;" aria-label="">Web</th>
                                        <th class="sorting" tabindex="0" aria-controls="kt_datatable_2" rowspan="1" colspan="1" style="width: 75px;" aria-label="">Email</th>
                                        <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 125px;" aria-label="">Accciones</th></tr>
                                    </thead>
                                @if($fabricantes->count())
                                    <tbody>
                                        @foreach($fabricantes as $fabricante)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">{{ $fabricante->id }}</td>
                                                <td>{{ $fabricante->nombre }}</td>
                                                <td>{{ $fabricante->telefono }}</td>
                                                <td>{{ $fabricante->web }}</td>
                                                <td>{{ $fabricante->email }}</td>
                                                <td nowrap="nowrap">
                                                    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2" title="Editar" wire:click="$emit('editar', {{$fabricante->id}})">
                                                        <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-09-29-132851/theme/html/demo1/dist/../src/media/svg/icons/Design/Edit.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"/>
                                                                <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
                                                                <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
                                                            </g>
                                                        </svg><!--end::Svg Icon--></span>
                                                    </a>
                                                    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Ver" wire:click="$emit('view', {{$fabricante->id}})">
                                                        <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-09-29-132851/theme/html/demo1/dist/../src/media/svg/icons/General/Visible.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"/>
                                                                <path d="M3,12 C3,12 5.45454545,6 12,6 C16.9090909,6 21,12 21,12 C21,12 16.9090909,18 12,18 C5.45454545,18 3,12 3,12 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                                <path d="M12,15 C10.3431458,15 9,13.6568542 9,12 C9,10.3431458 10.3431458,9 12,9 C13.6568542,9 15,10.3431458 15,12 C15,13.6568542 13.6568542,15 12,15 Z" fill="#000000" opacity="0.3"/>
                                                            </g>
                                                        </svg><!--end::Svg Icon--></span>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                @else
                            <div class="bg-white px4 py-3 border-t border-gray-200 sm:px-6 text-gray-500 min-width-message">
                                @lang('web.no_resultados') "{{ $search }}" @lang('web.en_la_pagina') {{ $page }} @lang('web.al_mostrar')  {{ $paginate }}
                            </div>
                            <div wire:loading class="bg-white px4 py-3  border-gray-200 sm:px-6 text-gray-500 min-width-message">
                                <div class="">@lang('web.buscando')</div>
                            </div>
                        @endif

                    </table>
                </div>
            </div>
            <!--------- Insertar paginacion  --------------->
            <div class="mt-3">
                {{ $fabricantes->links() }}
            </div>
            </div>
            <!--end: Datatable-->
        </div>
    </div>
    <!--end::Card-->
</div>




