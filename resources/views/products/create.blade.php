@extends('layout')

@section('content')
    <div class="card">
        <div class="card-header">
            Create a new user
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p class="mb-0">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            @if (session()->has('success'))
                <div class="alert alert-success">
                    <p class="mb-0">{{ session('success') }}</p>
                </div>
            @endif
            <form action="{{ route('products.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" name="price" class="form-control">
                </div>
                <div class="form-group">
                    <label for="phone" class="form-label">Categories</label>
                    @foreach ($categories as $category)
                        <p><input type="checkbox" name="categories[]" value="{{ $category->id }}"> {{ $category->title }}</p>
                    @endforeach
                </div>
                <div class="form-group mt-2">
                    <button class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection