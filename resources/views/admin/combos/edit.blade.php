@extends('layouts.admin')

@section('title', config('app.name') . ' | ' . $combo->name)

@section('content_header')
    <x-card>
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="text-bold">{{ $combo->name }}</h1>
        </div>
    </x-card>
@endsection

@section('content')
    <x-card>
        <x-form.combo data-update="{{ $combo->id }}" :combo="$combo" />
    </x-card>
    <section name="products">
        <div class="row">
            <div class="col-md-5">
                <x-card>
                    <x-slot name="title">
                        <div class="d-flex align-items-center">
                            <h5 class="mr-1">Añada un Producto</h5>
                            <x-icon name="plus" class="text-success" />
                        </div>
                    </x-slot>
                    <x-form id="formularioProductoCombo" method="POST" data-addto="{{ $combo->id }}">

                        <div class="repeat-container">
                            <div class="is-repeatable row">
                                <div class="col-8">
                                    <x-input.picklist name="product" label="Producto" class="product">
                                        @foreach ($categories as $category)
                                            <optgroup label="{{ $category->name }}">
                                                @foreach ($category->products as $product)
                                                    <option value="{{ $product->id }}">
                                                        {{ $product->name }}
                                                    </option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </x-input.picklist>
                                </div>
                                <div class="col-4">
                                    <x-input name="product_qty" type="number" label="Cantidad" class="productQty"
                                        value="1" placeholder="1" min="1" />
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <x-button url="" class="btn-sm mt-2" style="outline-secondary" data-repeat>
                                <x-icon name="plus" />
                            </x-button>

                            <x-button url="" class="btn-sm mt-2 text-secondary" style="link" data-remove>
                                <x-icon name="minus" />
                            </x-button>
                        </div>

                        <x-slot name="footer">
                            <x-form.actions />
                        </x-slot>
                    </x-form>
                </x-card>
            </div>
            <div class="col-md-7">
                <x-card>
                    <x-slot name="title">
                        <h5>Productos Relacionados</h5>
                    </x-slot>

                    <x-table id="productosCombo" :headers="['Name', 'Quantity', 'Actions']" data-combo="{{ $combo->id }}">
                    </x-table>
                </x-card>
            </div>
        </div>
    </section>
@endsection
