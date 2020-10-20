
<div class="container p-4">
    {{-- <div class="row">
        <div class="col-12">
            <h1 class="text-center text-base sm:text-lg md:text-xl lg:text-2xl xl:text-3xl">Productos</h1>
        </div>
    </div> --}}
    <div class="row">
        {{-- <div class="col-12 p-4">
            @include('livewire.producto.formfiltrado')
        </div> --}}
        <div class="col-12 p-4">
            @include('livewire.producto.tabla')
        </div>
        <div class="col-12 p-4">
            @include("livewire.$view")
        </div>
    </div>
</div>
