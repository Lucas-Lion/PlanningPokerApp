<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class VoteRegistered implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $gameId;
    public $weight;

    public function __construct($gameId, $weight)
    {
        $this->gameId = $gameId;
        $this->weight = $weight;
    }

    public function broadcastOn()
    {
        return new Channel('game.' . $this->gameId);
    }

    public function broadcastAs()
    {
        return 'VoteRegistered';
    }
}
