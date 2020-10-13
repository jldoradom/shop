<h1 class="text-lg font-medium text-gray-900 mb-4">Informacion del Producto</h1>
<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8 mb-3">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <table class="min-w-full divide-y divide-gray-200">
            <thead>
              <tr>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Dato
                </th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Contenido
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">ID</td>
                    <td class=""><div class="text-sm leading-5 text-gray-900 ml-3">{{ $producto_id }}</div></td>
                </tr>
                <tr>
                    <td class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">@lang('web.nombre')</td>
                    <td class=""><div class="text-sm leading-5 text-gray-900 ml-3">{{ $nombre }}</div></td>
                </tr>
                <tr>
                    <td class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">@lang('web.descripcion')</td>
                    <td class=""><div class="text-sm leading-5 text-gray-900 ml-3">{{ $descripcion }}</div></td>
                </tr>
                <tr>
                    <td class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        @lang('web.publicado')
                    </td>
                    <td class="">
                        <div class="text-sm leading-5 text-gray-900 ml-3">
                            @if($producto_estado)
                                OK
                            @else
                                NO
                            @endif
                        </div></td>
                </tr>
                <tr>
                    <td class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">@lang('web.precio')</td>
                    <td class=""><div class="text-sm leading-5 text-gray-900 ml-3">{{ $precio }}</div></td>
                </tr>
                <tr>
                    <td class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">stock</td>
                    <td class=""><div class="text-sm leading-5 text-gray-900 ml-3">{{ $stock }}</div></td>
                </tr>
                <tr>
                    <td class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Imagen</td>
                    <td class="">
                        <div class="text-sm leading-5 text-gray-900 ml-3">
                            @if($image)
                                <img style="width:200px; margin-top:20px;" src="{{ 'storage/'.$image }}" />
                            @endif
                        </div>
                    </td>
                </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <button class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs
 text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300
  focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150 mt-2 mr-2 mt-4" wire:click="default">
    @lang('web.limpiar_campos')
</button>

