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
    <x-modal label="registroIngrediente" title="Nuevo Combo" id="modal-formulario">
        <x-form id="formularioCombo" data-persist>
            <div class="form-group">
                <x-input name="name" label="Nombre" placeholder="Platillo Básico" />
                <div class="row">
                    <div class="col-md-6">
                        <x-input name="stock" type="number" label="Existencia" placeholder="1" />
                    </div>
                    <div class="col-md-6">
                        <x-input name="price" type="number" label="Precio" placeholder="1.50" step="0.01" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <x-input name="description" type="text-area" label="Descripción" rows="5">
                </x-input>
            </div>
            <x-slot name="footer">
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
            </x-slot>
        </x-form>
    </x-modal>
    <x-two-column-layout>
        <x-slot name="biggerColumn">
            <x-card>
                <x-table id="combos" class="table-sm" data-selectable-rows
                    :headers="['Nombre', 'Existencia', 'Precio' ,'Actualizado en', 'Acciones']" />
            </x-card>
        </x-slot>
        <x-slot name="smallerColumn">
            <x-card class="d-flex flex-grow">
                <x-table id="combo_products" class="table-sm" data-selectable-rows :headers="['Nombre', 'Existencia', 'Precio']" />
            </x-card>
        </x-slot>
    </x-two-column-layout>
@endsection

@section('js')
    <script src="https://cdn.datatables.net/fixedcolumns/4.0.0/js/fixedColumns.dataTables.js"></script>
    <script>
        $('#combo_products').DataTable(); 
    </script>
@endsection
