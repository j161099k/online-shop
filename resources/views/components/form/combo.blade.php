@props([
    'combo' => null,
])

<x-form id="formularioCombo" {{ $attributes->merge(['data-update' => $combo->id ?? null]) }}>
    <div class="form-group">
        <x-input name="name" label="Nombre" placeholder="Platillo Básico" value="{{ $combo->name ?? null }}" />
        <div class="row">
            <div class="col-md-6">
                <x-input name="stock" type="number" label="Existencia" placeholder="1"
                    value="{{ $combo->stock ?? null }}" />
            </div>
            <div class="col-md-6">
                <x-input name="price" type="number" label="Precio" placeholder="1.50" step="0.01"
                    value="{{ $combo->price ?? null }}" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <x-input.textarea name="description" label="Descripción" rows="5">
            {{ $combo->description ?? null }}
        </x-input.textarea>
    </div>

    <x-slot name="footer">
        <x-form.actions />
    </x-slot>
</x-form>
