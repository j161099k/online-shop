@extends('layouts.admin')

@section('content_header')
    <x-card>
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="text-bold">Platillos</h1>

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
    <x-modal label="registroIngrediente" title="Nuevo Producto" id="modal-formulario">
        <x-form id="formularioProducto" data-persist>
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
                <x-input name="description" type="text-area" label="Descripción" rows="10">
                </x-input>
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
        <x-table id="productos" class="table-sm"
            :headers="['ID', 'Nombre', 'Existencia', 'Precio' ,'Actualizado en', 'Acciones']" />
    </x-card>
@endsection

@section('js')
    <script src="https://cdn.datatables.net/fixedcolumns/4.0.0/js/fixedColumns.dataTables.js"></script>
@endsection
