<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PokerVote extends Model
{
    use HasFactory;

    protected $fillable = ['poker_game_id', 'user_id', 'weight'];

    public function pokerGame()
    {
        return $this->belongsTo(PokerGame::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
