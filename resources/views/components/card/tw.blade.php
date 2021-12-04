@props([
    'img' => null,
])

<div>
    <div {{ $attributes->merge(['class' => 'card']) }}>
        @if (isset($img))
            <figure>
                <img src="{{ $img }}">
            </figure>
        @endif
        <div class="card-body">
            {{ $slot }}
        </div>
    </div>
</div>
