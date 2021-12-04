@extends('layouts.admin')

@section('content_header')
    <x-card>
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="text-bold">Combos</h1>

            <x-button type="submit" class="btn-md d-flex justify-content-between align-items-center" data-toggle="modal"
                data-target="#modal-formulario">
                <span class="m-2">Nuevo</span>
                <x-icon name="plus"></x-icon>
            </x-button>
        </div>
    </x-card>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/4.0.0/css/fixedColumns.dataTables.min.css">
@endsection

@section('content')
    {{-- Formulario de registro --}}
    <x-modal label="registroCombo" title="Nuevo Combo" id="modal-formulario">
        <x-form.combo />
    </x-modal>

    <x-card>
        <x-table id="combos" class="table-sm" data-selectable-rows
            :headers="['Nombre', 'Existencia', 'Precio' ,'Actualizado en', 'Acciones']" />
    </x-card>
@endsection

@section('js')
    <script src="https://cdn.datatables.net/fixedcolumns/4.0.0/js/fixedColumns.dataTables.js"></script>
@endsection
