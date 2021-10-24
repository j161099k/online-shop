@props([
    'style' => 'primary',
    'url' => null,
])
<div>
    @if(isset($url))
    <a href="{{$url}}" class="btn btn-{{ $style }} {{ $attributes['class'] }}"
        {{ $attributes }}>{{ $slot }}</a>
    @else
    <button class="btn btn-{{ $style }} {{ $attributes['class'] }}"
        {{ $attributes }}>{{ $slot }}</button>
    @endif
</div>
