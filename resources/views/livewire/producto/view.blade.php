<h1 class="text-lg font-medium text-gray-900 mb-4">Informacion del Producto</h1>
<table class="table-auto">
    <thead>
      <tr>
        <th class="px-4 py-2">Dato</th>
        <th class="px-4 py-2">Contenido</th>
      </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-4 py-2">ID</td>
            <td class="border px-4 py-2">{{ $producto_id }}</td>
        </tr>
        <tr>
            <td class="border px-4 py-2">@lang('web.nombre')</td>
            <td class="border px-4 py-2">{{ $nombre }}</td>
        </tr>
        <tr>
            <td class="border px-4 py-2">@lang('web.descripcion')</td>
            <td class="border px-4 py-2">{{ $descripcion }}</td>
        </tr>
        <tr>
            <td class="border px-4 py-2">@lang('web.precio')</td>
            <td class="border px-4 py-2">{{ $precio }}</td>
        </tr>
        <tr>
            <td class="border px-4 py-2">@lang('web.publicado')</td>
            <td class="border px-4 py-2">
                @if($producto_estado)
                    OK
                @else
                    NO
                @endif

            </td>
        </tr>
        <tr>
            <td class="border px-4 py-2">Stock</td>
            <td class="border px-4 py-2">44</td>
        </tr>
        <tr>
            <td class="border px-4 py-2">Image</td>
            <td class="border px-4 py-2">
                @if($image)
                   <img style="width:200px; margin-top:20px;" src="{{ 'storage/'.$image }}" />
                @endif
            </td>
        </tr>
    </tbody>
</table>
  <button class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs
 text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300
  focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150 mt-2 mr-2 mt-4" wire:click="default">
    @lang('web.limpiar_campos')
</button>

