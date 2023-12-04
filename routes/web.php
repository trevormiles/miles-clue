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


Route::get('/', GameController::class . "@index")
    ->name('games.index');

Route::post('/games', GameController::class . "@create")
    ->name('games.create');

Route::get('/games/{game}', GameController::class . "@show")
    ->name('games.show');
