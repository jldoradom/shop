 <div class="container">
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
                <div class="card-body">
                    <div class="mb-7">
                        <div class="row align-items-center">
                            <div class="col-lg-9 col-xl-8">
                                <div class="row align-items-center">
                                    <div class="col-md-4 my-2 my-md-0">
                                        <div class="input-icon">
                                            <input type="text" class="form-control" placeholder="Buscar..." id="kt_datatable_search_query">
                                            <span>
                                                <i class="flaticon2-search-1 text-muted"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 my-2 my-md-0">
                                        <div class="d-flex align-items-center">
                                            <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
                                            <div class="dropdown bootstrap-select form-control"><select class="form-control" id="kt_datatable_search_status">
                                                <option value="">All</option>
                                                <option value="1">Pending</option>
                                                <option value="2">Delivered</option>
                                                <option value="3">Canceled</option>
                                                <option value="4">Success</option>
                                                <option value="5">Info</option>
                                                <option value="6">Danger</option>
                                            </select><button type="button" tabindex="-1" class="btn dropdown-toggle btn-light bs-placeholder" data-toggle="dropdown" role="combobox" aria-owns="bs-select-1" aria-haspopup="listbox" aria-expanded="false" data-id="kt_datatable_search_status" title="All"><div class="filter-option"><div class="filter-option-inner"><div class="filter-option-inner-inner">All</div></div> </div></button><div class="dropdown-menu "><div class="inner show" role="listbox" id="bs-select-1" tabindex="-1"><ul class="dropdown-menu inner show" role="presentation"></ul></div></div></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 my-2 my-md-0">
                                        <div class="d-flex align-items-center">
                                            <label class="mr-3 mb-0 d-none d-md-block">Type:</label>
                                            <div class="dropdown bootstrap-select form-control"><select class="form-control" id="kt_datatable_search_type">
                                                <option value="">All</option>
                                                <option value="1">Online</option>
                                                <option value="2">Retail</option>
                                                <option value="3">Direct</option>
                                            </select><button type="button" tabindex="-1" class="btn dropdown-toggle btn-light bs-placeholder" data-toggle="dropdown" role="combobox" aria-owns="bs-select-2" aria-haspopup="listbox" aria-expanded="false" data-id="kt_datatable_search_type" title="All"><div class="filter-option"><div class="filter-option-inner"><div class="filter-option-inner-inner">All</div></div> </div></button><div class="dropdown-menu "><div class="inner show" role="listbox" id="bs-select-2" tabindex="-1"><ul class="dropdown-menu inner show" role="presentation"></ul></div></div></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                                <a href="#" class="btn btn-light-primary px-6 font-weight-bold">Search</a>
                            </div>
                        </div>
                    </div>
                    <!--begin: Datatable-->
                    <div id="kt_datatable_2_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12"><table class="table table-separate table-head-custom table-checkable dataTable no-footer dtr-inline" id="kt_datatable_2" role="grid" aria-describedby="kt_datatable_2_info" style="width: 1231px;">
                        <thead>
                            <tr role="row"><th class="dt-left sorting_disabled" rowspan="1" colspan="1" style="width: 30px;" aria-label="Record ID">
                                <label class="checkbox checkbox-single">
                                    <input type="checkbox" value="" class="group-checkable">
                                    <span></span>
                                    </label>
                                </th>
                                <th class="sorting_desc" tabindex="0" aria-controls="kt_datatable_2" rowspan="1" colspan="1" style="width: 45px;" aria-sort="descending" aria-label="Order ID: activate to sort column ascending">ID/@lang('web.ver')</th>
                                <th class="sorting" tabindex="0" aria-controls="kt_datatable_2" rowspan="1" colspan="1" style="width: 65px;" aria-label="Country: activate to sort column ascending">@lang('web.nombre')</th>
                                <th class="sorting" tabindex="0" aria-controls="kt_datatable_2" rowspan="1" colspan="1" style="width: 81px;" aria-label="Ship City: activate to sort column ascending">@lang('web.descripcion')</th>
                                <th class="sorting" tabindex="0" aria-controls="kt_datatable_2" rowspan="1" colspan="1" style="width: 87px;" aria-label="Ship Address: activate to sort column ascending">@lang('web.precio')</th>
                                <th class="sorting" tabindex="0" aria-controls="kt_datatable_2" rowspan="1" colspan="1" style="width: 72px;" aria-label="Company Agent: activate to sort column ascending">@lang('web.publicado')</th>
                                {{-- <th class="sorting" tabindex="0" aria-controls="kt_datatable_2" rowspan="1" colspan="1" style="width: 116px;" aria-label="Company Name: activate to sort column ascending">Company Name</th>
                                <th class="sorting" tabindex="0" aria-controls="kt_datatable_2" rowspan="1" colspan="1" style="width: 47px;" aria-label="Ship Date: activate to sort column ascending">Ship Date</th>
                                <th class="sorting" tabindex="0" aria-controls="kt_datatable_2" rowspan="1" colspan="1" style="width: 75px;" aria-label="Status: activate to sort column ascending">Status</th>
                                <th class="sorting" tabindex="0" aria-controls="kt_datatable_2" rowspan="1" colspan="1" style="width: 75px;" aria-label="Type: activate to sort column ascending">Type</th> --}}
                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 125px;" aria-label="Actions">Actions</th></tr>
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
                                <td>{{ $producto->nombre }}</td>

                                <td>
                                    <span class="label label-lg font-weight-bold label-light-primary label-inline">Canceled</span>
                                </td>
                                <td>
                                    <span class="label label-primary label-dot mr-2"></span><span class="font-weight-bold text-primary">Retail</span>
                                </td>
                                <td nowrap="nowrap">
                                    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">
                                        <span class="svg-icon svg-icon-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect>
                                                    <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "></path>
                                                    <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"></rect>
                                                </g>
                                            </svg>
                                        </span>
                                    </a>
                                    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Delete">
                                        <span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect>
                                                <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
                                                <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
                                            </g></svg>
                                        </span>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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
            <!--------- Insertar paginacion aqui debajo --------------->
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
<h1 class="text-lg font-medium text-gray-900 mb-4">@lang('web.resultados_busqueda')</h1>
@if (session()->has('eliminado'))
    <div class="alert alert-success">
        {{ session('eliminado') }}
    </div>
@endif
@if($productos->count())
<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <table class="min-w-full divide-y divide-gray-200">
            <thead>
              <tr>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    ID/@lang('web.ver')
                </th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    @lang('web.nombre')
                </th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    @lang('web.descripcion')
                </th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    @lang('web.precio')
                </th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    @lang('web.publicado')
                </th>
                <th colspan="3" class="px-6 py-3 bg-gray-50">&nbsp;</th>

              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($productos as $producto)
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap">
                            <button class="revisar d-flex inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent
                            rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none
                             focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" wire:click="$emit('view', {{$producto->id}})">
                                <span class="mr-2 text-xs">{{ $producto->id }}</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                    </path></svg>
                            </button>

                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap">
                            <div class="text-sm leading-5 text-gray-900">{{ $producto->nombre }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap">
                            {{ $producto->descripcion }}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap">
                            {{ $producto->precio }}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">

                            </span>
                            @if($producto->estado)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">OK</span>
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-green-800">NO</span>
                            @endif
                        </td>
                        <td>
                            <button wire:click="$emit('editar', {{$producto->id}})"   class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent
                                 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none
                                  focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                    </path>
                                </svg>

                            </button>
                        </td>
                        <td>
                            <button  wire:click="cambiarEstado({{ $producto->id }})"  class="text-xs inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent
                                 rounded-md font-semibold text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none
                                  focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                  @lang('web.publicar')
                            </button>
                        </td>
                        <td>
                            @if($confirming===$producto->id)
                                <button href="#" wire:click="$emit('eliminar', {{$producto->id}})"  class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent
                                    rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700
                                    focus:shadow-outline-red active:bg-red-600 transition ease-in-out duration-150">
                                    ok
                                </button>
                                <button href="#" wire:click="noeliminar()"  class="inline-flex items-center justify-center px-4 py-2 bg-green-600 border border-transparent
                                    rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 focus:outline-none focus:border-green-700
                                    focus:shadow-outline-green active:bg-green-600 transition ease-in-out duration-150">
                                    no
                                </button>
                            @else
                                <button href="#"   wire:click="confirmDelete({{ $producto->id }})" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent
                                    rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700
                                    focus:shadow-outline-red active:bg-red-600 transition ease-in-out duration-150">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <div class="mt-3">
            {{ $productos->links() }}
        </div>
      </div>
    </div>
  </div>
@else
    <div class="bg-white px4 py-3 border-t border-gray-200 sm:px-6 text-gray-500">
        @lang('web.no_resultados') "{{ $search }}" @lang('web.en_la_pagina') {{ $page }} @lang('web.al_mostrar')  {{ $paginate }}
    </div>
@endif


