<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    
    public function scopeNintendo($query)
    {
        return $query->where('publisher', '=', 'Nintendo');
    }
    
    public function addReview($body)
    {
        $this->reviews()->create(['body' => $body]);
    }
}