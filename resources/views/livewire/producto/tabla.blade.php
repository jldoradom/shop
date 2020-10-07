<h1 class="text-lg font-medium text-gray-900 mb-4">Resultados busqueda</h1>
<table class="table">
    <thead>
        <tr>
            <th>ID/VER</th>
            <th>@lang('web.nombre')</th>
            <th>@lang('web.descripcion')</th>
            <th>@lang('web.precio')</th>
            <th>Publicado</th>
            <th colspan="3">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @foreach($productos as $producto)
            <tr>
                <td class="pt-4">
                    <button class="d-flex inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent
                    rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none
                     focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" wire:click="revisar({{ $producto->id }})">
                        <span class="mr-2 text-base">{{ $producto->id }}</span>
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                            </path></svg>
                    </button>
                </td>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->descripcion }}</td>
                <td>{{ $producto->precio }}</td>

                <td class="text-center pt-6" style="padding-top:1.5rem">
                    @if($producto->estado)
                        <span class="bg-green-600 p-2 rounded text-white font-medium">OK</span>
                    @else
                        <span class="bg-red-600 p-2 rounded text-white font-medium">NO</span>
                    @endif
                </td>
                <td>
                    <button wire:click="edit({{ $producto->id }})"  class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent
                         rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none
                          focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                        {{-- @lang('web.editar') --}}
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                            </path>
                        </svg>

                    </button>
                </td>
                <td>
                    <button  wire:click="cambiarEstado({{ $producto->id }})"  class="text-base inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent
                         rounded-md font-semibold text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none
                          focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                        Publicar
                    </button>
                </td>
                <td>
                    @if($confirming===$producto->id)
                        <button href="#" wire:click="destroy({{ $producto->id }})" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent
                            rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700
                            focus:shadow-outline-red active:bg-red-600 transition ease-in-out duration-150">
                            Seguro?
                        </button>
                    @else
                        <button href="#" wire:click="confirmDelete({{ $producto->id }})" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent
                            rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700
                            focus:shadow-outline-red active:bg-red-600 transition ease-in-out duration-150">
                            {{-- @lang('web.eliminar') --}}
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
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
{{ $productos->links() }}
