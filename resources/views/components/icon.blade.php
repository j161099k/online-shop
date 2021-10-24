@props([
    'name' => null,
    'type' => 'fas',
])
<div>
    <i class="{{$type}} fa-{{$name}} {{$attributes['class']}}" {{$attributes}}></i>
</div>