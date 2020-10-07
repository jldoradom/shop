<h1 class="text-lg font-medium text-gray-900  mb-4">@lang('web.formulario_para_Editar_un_producto')</h1>
    <form wire:submit.prevent="update">
        <div>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        @include('livewire.producto.form')
    </form>
<button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent
rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none
 focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 mr-4" wire:click="update">
    @lang('web.actualizar')
</button>
<button class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs
 text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300
  focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150 mt-2 mr-2" wire:click="default">
    @lang('web.limpiar_campos')
</button>
