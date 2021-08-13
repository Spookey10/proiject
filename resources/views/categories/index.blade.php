@extends('layout')

@section('content')
    <h2>Our Categories.</h2>
    <hr>
    @foreach ($categories as $category)
        <div class="mt-4">
            <h2 class="mr-0 pr-0">{{ $category->title }}</h2>
            <p>( {{ $category->products()->count() }} ) products</p>
        </div>
    @endforeach
@endsection