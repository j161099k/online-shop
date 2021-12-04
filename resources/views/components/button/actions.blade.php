@props([
    'dstyle' => 'outline-primary',
    'estyle' => 'primary',
])

<div>
    <div class="d-inline-flex">
        <x-button :style="$estyle" class="btn-sm mr-1" data-edit>
            <x-icon name="edit" />
        </x-button>
        <x-button :style="$dstyle" class="btn-sm" data-delete>
            <x-icon name="trash" />
        </x-button>
    </div>
</div>
