<?php

namespace App\Http\Controllers;

use App\Models\PokerGame;
use Illuminate\Http\Request;

class PokerGameController extends Controller
{
    public function show($id)
    {
        $pokerGame = PokerGame::findOrFail($id);
        return view('poker-game.show', compact('pokerGame'));
    }
}