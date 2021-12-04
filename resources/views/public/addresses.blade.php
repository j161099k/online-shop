@extends('layouts.app')

@section('content')
    <input type="checkbox" id="address-modal" class="modal-toggle">
    <div class="modal">
        <div class="modal-box">
            <x-form method="POST">
                <div class="form-control">
                    <x-input.tw label="Calle" placeholder="P. Sherman, Wallaby" class="w-full" />
                    <div class="md:flex md:space-x-2">
                        <x-input.tw type="number" label="Núm. Ext" placeholder="42" class="w-full" />
                        <x-input.tw label="Núm. Int" placeholder="23A" class="w-full" />
                    </div>
                </div>
                <x-slot name="footer">
                    <div class="modal-action">
                        <label for="address-modal" class="btn btn-primary">Accept</label>
                        <label for="address-modal" class="btn">Close</label>
                    </div>
                </x-slot>
            </x-form>
        </div>
    </div>


    <div class="grid grid-cols-4 gap-8">
        @foreach ($addresses as $address)
            <div class="card bordered">
                <div class="card-body">
                    <div class="flex justify-between items-start">
                        <h2 class="text-base-content font-semibold">{{ $address->formatted }}</h2>
                        <div class="flex space-x-1">
                            <label for="address-modal" class="btn btn-primary btn-sm">
                                <x-icon name="pen" />
                            </label>
                            <label for="address-modal" class="btn btn-ghost btn-sm">
                                <x-icon name="trash" />
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
