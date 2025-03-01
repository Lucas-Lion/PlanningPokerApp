<?php

use App\Http\Controllers\PokerGameController;
use App\Livewire\PokerGame;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/poker-game/{id}', [PokerGameController::class, 'show'])->name('viewItem');
Route::get('/game/{id}', PokerGame::class)->name('game.view');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
