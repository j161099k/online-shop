@props([
    'label' => null,
])

<div>
    <label for="{{ $attributes['id'] }}" class="{{ $attributes['label-class'] }}">
        {{ $label }}
    </label>

    <input {{ $attributes->merge(['class' => 'form-control', 'type' => 'text']) }} />
</div>
