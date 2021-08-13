
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\Review;

class ReviewsController extends Controller
{
    public function store(Game $game)
    {
        $this->validate(request(), [
            'body' => 'required|min:3'
        ]);
        
        $game->addReview(request('body'));
        
        return back();
    }
}