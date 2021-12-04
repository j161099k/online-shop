@extends('layouts.app')

@section('content')
    <x-card.tw>
        <div class="card-title text-base-content">
            {{ dd(Auth::user()->cart->products)  }}
        </div>
    </x-card.tw>
@endsection