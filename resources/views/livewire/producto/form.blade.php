<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label class="block font-medium text-sm text-gray-700" for="nombre">@lang('web.nombre')</label>
            <input type="text" id="nombre" class="form-control @error('nombre') is-invalid @enderror" wire:model="nombre">
            @error('nombre')
                <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label class="block font-medium text-sm text-gray-700" for="descripcion">@lang('web.descripcion')</label>
            <textarea id="descripcion"  class="form-control @error('descripcion') is-invalid @enderror" wire:model="descripcion">
            </textarea>
            @error('descripcion')
                <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label class="block font-medium text-sm text-gray-700" for="precio" >@lang('web.precio')</label>
            <input type="text" id="precio" class="form-control @error('precio') is-invalid @enderror" wire:model="precio">
            @error('precio')
                <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label class="block font-medium text-sm text-gray-700" for="stock">Stock</label>
            <input type="text" id="stock" class="form-control @error('stock') is-invalid @enderror" wire:model="stock">
            @error('stock')
                <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>
        {{-- <fieldset class="border p-4 mt-5">
            <legend  class="block font-medium text-sm text-gray-700">Imágenes Establecimiento: </legend>
                <div class="form-group">
                    <label for="imagenes"></label>
                    <div id="dropzone" class="dropzone form-control"></div>
                </div>
        </fieldset> --}}
        <div class="form-group">
            <label class="block font-medium text-sm text-gray-700" for="image">Imagen</label>
            <input type="file" id="image" class="form-control @error('image') is-invalid @enderror" wire:model="image">
            @error('image')
                <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>
        {{-- <input type="hidden" id="uuid" name="uuid" value="{{ Str::uuid()->toString() }}"> --}}
    </div>
    <div class="col-6">
        <p>Resto de campos</p>
    </div>
</div>
