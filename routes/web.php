<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\GameTypeController;

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

Route::get('/players/{player}/edit', PlayerController::class . "@edit")
    ->name('players.edit');

Route::patch('/players/{player}', PlayerController::class . "@update")
    ->name('players.update');


// Card routes
Route::get('/cards', CardController::class . "@index")
    ->name('cards.index');

Route::get('/cards/create', CardController::class . "@create")
    ->name('cards.create');

Route::post('/cards', CardController::class . "@store")
    ->name('cards.store');

Route::get('/cards/{card}/edit', CardController::class . "@edit")
    ->name('cards.edit');

Route::patch('/cards/{card}', CardController::class . "@update")
    ->name('cards.update');


// Game type routes
Route::get('/game-types', GameTypeController::class . "@index")
    ->name('gameTypes.index');

Route::get('/game-types/create', GameTypeController::class . "@create")
    ->name('gameTypes.create');

Route::post('/game-types', GameTypeController::class . "@store")
    ->name('gameTypes.store');

Route::get('/game-types/{gameType}/edit', GameTypeController::class . "@edit")
    ->name('gameTypes.edit');

Route::patch('/game-types/{gameType}', GameTypeController::class . "@update")
    ->name('gameTypes.update');


// Card variant routes
Route::get('/card-variants', CardVariantController::class . "@index")
    ->name('cardVariants.index');

Route::get('/card-variants/create', CardVariantController::class . "@create")
    ->name('cardVariants.create');

Route::post('/card-variants', CardVariantController::class . "@store")
    ->name('cardVariants.store');

Route::get('/card-variants/{cardVariant}/edit', CardVariantController::class . "@edit")
    ->name('cardVariants.edit');

Route::patch('/card-variants/{cardVariant}', CardVariantController::class . "@update")
    ->name('cardVariants.update');
