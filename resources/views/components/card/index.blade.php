<div>
    <div {{$attributes->merge(['class' => 'card']) }}>
        @if (isset($title))
            <div class="card-header">
                <div class="d-flex justify-content-start align-items-center">
                    {{ $title }}
                </div>
            </div>
        @endif
        <div class="card-body">
            {{ $slot }}
        </div>
        @if (isset($footer))
            <div class="card-footer">
                {{ $footer }}
            </div>
        @endif
    </div>
</div>
