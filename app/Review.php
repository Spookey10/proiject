<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['body', 'game_id'];
    
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}