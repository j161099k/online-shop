@props([
    'style' => 'primary',
    'url' => null,
])

@php
    $attr = $attributes->merge(['class' => "btn btn-$style"]);
@endphp

<div>
    @if(isset($url))
    <a href="{{$url}}" {{ $attr }}"
        {{ $attributes }}>{{ $slot }}
    </a>
    @else
    <button {{ $attr }}
        {{ $attributes }}>{{ $slot }}
    </button>
    @endif
</div>
