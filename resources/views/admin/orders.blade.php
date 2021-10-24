@extends('layouts.admin')

@section('content_header')
    <h1>Ordenes</h1>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/4.0.0/css/fixedColumns.dataTables.min.css">
@endsection

@section('content')
    <x-two-column-layout>
        <x-slot name="biggerColumn">
            <x-card>
                <x-slot name="title">
                    <h4 class="mr-2">Lista de Ordenes</h4>
                    <x-icon name="list-ul" class="text-success" style="height: 25px; width: 25px;" />
                </x-slot>
                <ul class="list-group">
                    <li class="list-group-item bg-white">
                        <div class="d-flex justify-content-between w-100 align-items-center">
                            <span>Delivered</span>
                            <div>
                                <label for="delivered">
                                    <x-icon name="check" class="text-primary" />
                                </label>
                                <input type="checkbox" name="delivered" id="delivered" hidden />
                            </div>
                        </div>
                    </li>
                </ul>
            </x-card>
        </x-slot>
        <x-slot name="smallerColumn">
        </x-slot>
    </x-two-column-layout>
@endsection

@section('js')
    <script src="https://cdn.datatables.net/fixedcolumns/4.0.0/js/fixedColumns.dataTables.js"></script>
@endsection
