<div>
    <form {{ $attributes }}>
        @csrf
        {{ $slot }}

        <div class="d-flex justify-content-between align-items-center">
            {{ $footer }}
        </div>
    </form>
</div>
