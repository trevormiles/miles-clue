<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PlayerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Game routes
Route::get('/', GameController::class . "@index")
    ->name('games.index');

Route::get('/games/create', GameController::class . "@create")
    ->name('games.create');

Route::post('/games', GameController::class . "@store")
    ->name('games.store');

Route::get('/games/{game}', GameController::class . "@show")
    ->name('games.show');

Route::get('/games/{game}/edit', GameController::class . "@edit")
    ->name('games.edit');

Route::patch('/games/{game}', GameController::class . "@update")
    ->name('games.update');

Route::delete('/games/{game}', GameController::class . "@destroy")
    ->name('games.destroy');

Route::get('/games/{game}/add-player', GameController::class . "@addPlayer")
    ->name('games.addPlayer');

Route::patch('/games/{game}/add-player', GameController::class . "@storePlayer")
    ->name('games.storePlayer');

Route::patch('/games/{game}/remove-player/{player}', GameController::class . "@removePlayer")
    ->name('games.removePlayer');

Route::get('/games/{game}/card-checker', GameController::class . "@cardChecker")
    ->name('games.cardChecker');


// Player routes
Route::get('/players', PlayerController::class . "@index")
    ->name('players.index');

Route::get('/players/create', PlayerController::class . "@create")
    ->name('players.create');

Route::post('/players', PlayerController::class . "@store")
    ->name('players.store');

Route::get('/players/{player}', PlayerController::class . "@show")
    ->name('players.show');

Route::get('/players/{player}/edit', PlayerController::class . "@edit")
    ->name('players.edit');

Route::patch('/players/{player}', PlayerController::class . "@update")
    ->name('players.update');
