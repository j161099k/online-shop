@props([
    'label' => '',
    'title' => '',
])

<div>
    <div {{ $attributes->merge(['class' => 'modal fade']) }} tabindex="-1" role="dialog"
        aria-labelledby="{{ $label }}" aria-hidden="true" {{ $attributes }}>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    @if (isset($header))
                        {{ $header }}
                    @else
                        <h5 class="modal-title" id="{{ $label }}">{{ $title }}</h5>
                    @endif
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ $slot }}
                </div>
                @if (isset($footer))
                    <div class="modal-footer">
                        {{ $footer }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
