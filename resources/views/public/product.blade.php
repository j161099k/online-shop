@extends('layouts.app')

@section('content')
    <input type="checkbox" id="addresses-modal" class="modal-toggle">
    <div class="modal">
        <div class="modal-box">
            <h2 class="text-base-content text-2xl font-semibold">Seleccione una dirección</h2>

            @foreach (Auth::user()->addresses as $address)
                <label for="addresses-modal">
                    <x-card.tw class="bordered cursor-pointer" data-address="{{ $address->id }}">
                        <h6 class="card-title">{{ $address->formatted }}</h6>
                    </x-card.tw>
                </label>
            @endforeach

            <div class="modal-action">
                <label for="addresses-modal" class="btn btn-primary">Accept</label>
                <label for="addresses-modal" class="btn">Close</label>
            </div>
        </div>
    </div>

    <x-card.tw class="card-side bordered" data-product="{{ $product->id }}" :img="$product->photo">
        <h2 class="card-title text-2xl">{{ $product->name }}</h2>
        <p class="px-2 overflow-ellipsis">
            {{ $product->description }}
        </p>
        <x-form method="POST">
            <div class="form-control">
                <x-input.tw type="number" label="Quantity" class="input-sm" />
            </div>
            <x-slot name="footer">
                <div class="card-actions">
                    <label for="addresses-modal" class="btn btn-base btn-sm add-to-cart">
                        Add to Cart
                    </label>
                </div>
            </x-slot>
        </x-form>
    </x-card.tw>
@endsection
