@props([
    'label' => null,
    'options' => [],
    'type' => 'text',
])

<div>
    <label for="{{ $attributes['id'] }}" class="{{ $attributes['label-class'] }}">
        {{ $label }}
    </label>

    @switch($type)
        @case('text-area')
            <textarea id="{{ $attributes['name'] }}" class="form-control {{ $attributes['class'] }}" {{ $attributes }}>
                {{ trim($slot) }}
            </textarea>
        @break
        @case('select')
            <select id="$attributes['name']" class="form-control {{ $attributes['class'] }}" {{ $attributes }}>
                @foreach ($options as $option)
                    <option value="{{ $option['value'] }}" {{ $option['selected']? 'selected' : '' }}>
                        {{ $option['label'] }}
                    </option>
                @endforeach
            </select>
        @break
        @default
            <input id="{{ $attributes['name'] }}" type="{{ $type }}"
                class="form-control {{ $attributes['class'] }}" {{ $attributes }} />
    @endswitch
</div>
