<div class="row">
    <div class="col-12">
        <div class="">
            <!--begin::List Widget 10-->
            <div class="card card-custom card-stretch gutter-b mt-5">
                <!--begin::Header-->
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">@lang('web.pedidos')
                        <span class="text-muted pt-2 font-size-sm d-block">@lang('web.cambiar_estado_sub')</span></h3>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Item-->
                    @if(count($pedidos) > 0)
                    <form wire:submit.prevent="update">
                        <div class="card-body">
                           <div class="row">
                               <div class="col-12 col-md-6">
                                   <div class="form-group">
                                       <label  for="estado">@lang('web.estado')</label>
                                       <select id="estado" class="form-control @error('estado') is-invalid @enderror" wire:model="estado">
                                            <option value="proceso">@lang('web.proceso')</option>
                                            <option value="enviado">@lang('web.enviado')</option>
                                            <option value="completado">@lang('web.completado')</option>
                                            <option value="anulado">@lang('web.anulado')</option>
                                       </select>
                                       @error('estado')
                                           <span class="text-red-600">{{ $message }}</span>
                                       @enderror
                                   </div>
                               </div>
                           </div>
                       </form>
                        <div class="my-5 d-flex align-space-between">
                            @if($lineaspedidos->count() > 0)
                                <button  class="btn btn-primary font-weight-bolder d-flex" wire:click="update">
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
                                    </span>@lang('web.cambiar_estado')
                                </button>
                            @endif
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










