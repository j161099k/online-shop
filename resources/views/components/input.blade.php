@props([
    'label' => null,
    'type' => 'text',
])

<div>
    <label for="{{ $attributes['id'] }}" class="{{ $attributes['label-class'] }}">
        {{ $label }}
    </label>

    <input id="{{ $attributes['name'] }}" type="{{ $type }}" class="form-control {{ $attributes['class'] }}"
        {{ $attributes }} />
</div>
