<div>
    <div {{ $attributes->merge(['class' => 'd-flex justify-content-between']) }} >
        <x-button type="reset" class="btn-sm" style="outline-primary">
            <span class="d-flex justify-content-center align-items-center" data-dismiss="modal">
                Cancelar
                <x-icon name="ban" class="ml-2" />
            </span>
        </x-button>
        <x-button type="submit" class="btn-sm">
            <span class="d-flex justify-content-center align-items-center">
                Guardar
                <x-icon name="save" class="ml-2" />
            </span>
        </x-button>
    </div>
</div>
