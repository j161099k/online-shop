@props([
    'label' => null,
    'options' => [],
])

<div>
    <label for="{{ $attributes['id'] }}" class="{{ $attributes['label-class'] }}">
        {{ $label }}
    </label>
    <select class="form-control {{ $attributes['class'] }}" {{ $attributes }}>
        <option value="none">{{ $label ?: $attributes['default-option-label'] }}</option>
        @forelse ($options as $value => $label)
            <option value="{{ $value }}">
                {{ $label }}
            </option>
        @empty
            {{ $slot }}
        @endforelse
    </select>
</div>
