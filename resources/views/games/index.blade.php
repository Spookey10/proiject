
@extends('layouts.master')

@section('content')

    @foreach($games as $game)
        <div class="col-12 mb-3">
            <div class="card">
                <div class="card-block">
                    <h3 class="card-title"><a href="/games/{{ $game->id }}">{{ $game->title }}</a></h3>
                    <p class="card-text">Published by {{ $game->publisher }}</p>
                    <a href="/games/{{ $game->id }}" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
    @endforeach
    
@endsection