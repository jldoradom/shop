
<div class="">
    {{-- <div class="row">
        <div class="col-12">
            <h1 class="text-center text-base sm:text-lg md:text-xl lg:text-2xl xl:text-3xl">Productos</h1>
        </div>
    </div> --}}
    <div class="row">
        <div class="">
            @include('livewire.producto.tabla')
        </div>
        <div class="">
            @include("livewire.$view")
        </div>
    </div>
</div>
