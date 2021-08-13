@extends('layout')

@section('content')
    <h2>Our users.</h2>
    <hr>
    @foreach ($products as $product)
        <div class="mt-4">
            <h2 class="mr-0 pr-0">{{ $product->title }}</h2>
            @foreach ($product->categories as $category)
                <span class="badge bg-secondary">{{ $category->title }}</span>
            @endforeach
        </div>
    @endforeach
@endsection