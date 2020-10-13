<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label class="block font-medium text-sm text-gray-700" for="nombre">@lang('web.nombre')</label>
            <input type="text" id="nombre" class="form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5 @error('nombre') is-invalid @enderror" wire:model="nombre">
            @error('nombre')
                <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label class="block font-medium text-sm text-gray-700" for="descripcion">@lang('web.descripcion')</label>
            <textarea id="descripcion"  class="form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5 @error('descripcion') is-invalid @enderror" wire:model="descripcion">
            </textarea>
            @error('descripcion')
                <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label class="block font-medium text-sm text-gray-700" for="precio" >@lang('web.precio')</label>
            <input type="text" id="precio" class="form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5 @error('precio') is-invalid @enderror" wire:model="precio">
            @error('precio')
                <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label class="block font-medium text-sm text-gray-700" for="stock">Stock</label>
            <input type="text" id="stock" class="form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5 @error('stock') is-invalid @enderror" wire:model="stock">
            @error('stock')
                <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>
        {{-- <fieldset class="border p-4 mt-5">
            <legend  class="block font-medium text-sm text-gray-700">Imágenes Establecimiento: </legend>
                <div class="form-group">
                    <label for="imagenes"></label>
                    <div id="dropzone" class="dropzone form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5"></div>
                </div>
        </fieldset> --}}
        <div class="form-group">
            <label class="block font-medium text-sm text-gray-700" for="image">Imagen</label>
            <input type="file" id="image" class="form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5 @error('image') is-invalid @enderror" wire:model="image">
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
