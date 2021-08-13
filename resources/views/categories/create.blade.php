@extends('layout')

@section('content')
    <div class="card">
        <div class="card-header">
            Create a new category
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
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group mt-2">
                    <button class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection