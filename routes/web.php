<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;

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