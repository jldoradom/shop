{{-- <h1 class="text-lg font-medium text-gray-900 mb-4">@lang('web.resultados_busqueda')</h1> --}}
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
                {{-- <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    @lang('web.descripcion')
                </th> --}}
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
                        {{-- <td class="px-6 py-4 whitespace-no-wrap">
                            {{ $producto->descripcion }}
                        </td> --}}
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


