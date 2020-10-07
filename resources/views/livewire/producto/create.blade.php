<h1 class="text-lg font-medium text-gray-900  mb-4">@lang('web.formulario_para_añadir_un_nuevo_producto')</h1>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
    @include('livewire.producto.form')
<button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent
rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none
 focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" wire:click="store">
    @lang('web.guardar')

</button>
