@extends('layouts.master')

@section('content')
    <div class="card" style="width: 270px;margin: 5px">
        <img class="card-img-top" src="{{ Storage::url($game->image)  }}" alt="Card image cap">
        <div class="card-block">
            <h3 class="card-title">{{ $game->title }}</h3>
            <p class="card-text">{{ $game->title }} is published by {{ $game->publisher }}</p>
            <a href="/games" class="btn btn-primary">List Games</a>
        </div>
    </div>

    <hr>

    <div class="reviews">
        <h4>What Gamers Are Saying</h4>
        <ul class="list-group">
            @foreach($game->reviews as $review)
                <li class="list-group-item">{{ $review->body }}
                    <hr>
                    <small class="text-primary">posted {{$review->created_at->diffForHumans()}}</small>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="addreview">
        <div class="card-block">
            <form method="POST" action="/games/{{ $game->id }}/reviews">
                {{ csrf_field() }}
                <div class="form-group">
                    <textarea name="body" class="form-control" placeholder="Add a review!"></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add a review!</button>
                </div>
              
            </form>
        </div>
    </div>

@endsection