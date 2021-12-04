@props([
    'identifier' => null,
    'data' => null,
])

<div>
    <form {{ $attributes->merge(['data-update'=> $identifier]) }}>
        @csrf
        {{ $slot }}

        <div class="d-flex justify-content-between align-items-center">
            {{ $footer }}
        </div>
    </form>
</div>