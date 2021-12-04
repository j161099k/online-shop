@extends('layouts.app')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-4 3xl:grid-cols-8  gap-4">
        @foreach ($products as $product)
            <a href="{{ route('product', ['product' => $product->id]) }}">
                <x-card.tw class="bordered" :img="$product->photo">
                    <h2 class="card-title">{{ $product->name }}</h2>
                    <p>{{ $product->description }}</p>
                </x-card.tw>
            </a>
        @endforeach
    </div>

    {{-- <div class="btn-group">
        <a class="btn" href="{{ $products->previousPageUrl() }}">Previous</a>
        <a class="btn">1</a>
        <a class="btn btn-active">2</a>
        <a class="btn">3</a>
        <a class="btn">4</a>
        <a class="btn">Next</a>
    </div> --}}

    {{ $products->links() }}
@endsection
