@props([
    'label' => null,
])

<div>
    <label for="{{ $attributes['id'] }}" class="{{ $attributes['label-class'] }}">
        {{ $label }}
    </label>

    <textarea id="{{ $attributes['name'] }}" class="form-control {{ $attributes['class'] }}" {{ $attributes }}>
                {{ trim($slot) }}
    </textarea>
</div>
