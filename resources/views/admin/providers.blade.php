@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/4.0.0/css/fixedColumns.dataTables.min.css">
@endsection

@section('content_header')
    <x-card>
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="text-bold">Proveedor</h1>

            <x-button type="submit" class="btn-md d-flex justify-content-between align-items-center" data-toggle="modal"
                data-target="#modal-formulario">
                <span class="m-2">Nuevo</span>
                <x-icon name="plus"></x-icon>
            </x-button>
        </div>
    </x-card>
@endsection

@section('content')
    {{-- Formulario de registro --}}
    <x-modal label="registroProveedor" title="Nuevo Proveedor" id="modal-formulario">
        <x-form id="formularioProveedor" data-persist>
            <div class="form-group">
                <div class="row">
                    <div class="col-lg">
                        <x-input name="first_name" label="Nombre" placeholder="Pedro" />
                    </div>
                    <div class="col-lg">
                        <x-input name="last_name" label="Apellido" placeholder="García" />
                    </div>
                </div>
                <x-input type="tel" name="phone_number" label="Número de Telefono" />
            </div>
            <x-slot name="footer">
                <x-button type="reset" class="btn-sm" style="outline-primary" data-dismiss="modal">
                    <span class="d-flex justify-content-center align-items-center">
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
            </x-slot>
        </x-form>
    </x-modal>

    <x-card>
        <x-table id="proveedores" class="table-sm" data-selectable-rows
            :headers="['Nombre', 'Apellido', 'Número de Telefono', 'Actualizado', 'Acciones' ]" />
    </x-card>
@endsection

@section('js')
    <script src="https://cdn.datatables.net/fixedcolumns/4.0.0/js/fixedColumns.dataTables.js"></script>
@endsection
