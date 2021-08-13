<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\ReviewsController;


Route::resource('products', ProductsController::class);
Route::resource('categories', CategoriesController::class);
Route::resource('games', GamesController::class);

//Route::get('/games', 'App\Http\Controllers\GamesController@index');

Route::get('/', function () {
    return view('home');
});


// Route::get('games', 'GamesController@index');

// Route::get('games/create', 'GamesController@create');

// Route::get('games/{game}', 'GamesController@show');

// Route::post('games', 'GamesController@store');
Route::get('games/{game}/reviews', 'ReviewsController@get');
Route::post('games/{game}/reviews', 'ReviewsController@store');