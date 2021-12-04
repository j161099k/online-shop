@props([
    'label' => null,
])

<div>
    <label for="{{ $attributes['id'] }}" class="{{ $attributes['label-class'] }}">
        {{ $label }}
    </label>

    <textarea {{ $attributes->merge(['class' => 'form-control']) }}>
                {{ ltrim($slot) }}
    </textarea>
</div>
