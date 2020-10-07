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
    </div>
    <div class="col-6">
        <p>Resto de campos</p>
    </div>
</div>
