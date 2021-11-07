@props([
    'label' => null,
    'options' => [],
])

<div>
    <label for="{{ $attributes['id'] }}" class="{{ $attributes['label-class'] }}">
        {{ $label }}
    </label>
    <select id="{{ $attributes['name'] }}" class="form-control {{ $attributes['class'] }}" {{ $attributes }}>
        <option value="none">{{ $label ?: $attributes['default-option-label'] }}</option>
        @foreach ($options as $value => $label)
            <option value="{{ $value }}">
                {{ $label }}
            </option>
        @endforeach
    </select>
</div>
