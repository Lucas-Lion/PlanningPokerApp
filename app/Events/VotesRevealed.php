<?php

namespace App\Events;

use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\InteractsWithSockets;
use App\Models\PokerGame;

class VotesRevealed implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $gameId;
    public $votes;

    public function __construct($gameId)
    {
        $this->votes = PokerGame::find($gameId)
            ->votes()
            ->with('user')
            ->get()
            ->map(function ($vote) {
                return [
                    'user' => $vote->user ? $vote->user->name : 'Usuário desconhecido',
                    'weight' => $vote->weight,
                ];
            });
    }

    /**
     * Define o canal no qual o evento será transmitido.
     */
    public function broadcastOn()
    {
        return new \Illuminate\Broadcasting\Channel('game.' . $this->gameId);
    }

    /**
     * Define os dados que serão enviados na transmissão.
     */
    public function broadcastWith()
    {
        return [
            'votes' => collect($this->votes)->map(function ($vote) {
                return [
                    'user' => is_array($vote['user']) ? $vote['user']['name'] ?? 'Usuário desconhecido' : $vote['user'],
                    'weight' => $vote['weight'],
                ];
            })->toArray(),
        ];
    }
}
