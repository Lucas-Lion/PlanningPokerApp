<?php

namespace App\Livewire;

use App\Events\VoteRegistered;
use App\Models\PokerGame as ModelsPokerGame;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Events\VotesRevealed;

class PokerGame extends Component
{
    public $gameId;
    public $game;
    public $votingOptions = [];
    public $votes = [];
    public $revealed = false;

    public function mount($id)
    {
        $this->gameId = $id;
        $this->game = ModelsPokerGame::find($id);
        $this->votingOptions = json_decode($this->game->voting_system, true);
        $this->votes = $this->game->votes()->get()->toArray();
    }

    public function vote($weight)
    {
        $existingVote = $this->game->votes()->where('user_id', Auth::id())->first();

        if ($existingVote) {

            $existingVote->update(['weight' => $weight]);
        } else {

            $this->game->votes()->create([
                'user_id' => Auth::id(),
                'weight' => $weight,
            ]);
        }

        $this->votes = $this->game->votes()->get()->toArray();
        Broadcast(new VoteRegistered($this->gameId, $weight));

        session()->flash('message', 'Voto registrado com sucesso.');
    }

    public function revealVotes()
    {
        if (Auth::id() !== $this->game->created_by) {
            session()->flash('error', 'Apenas o criador do jogo pode revelar os votos.');
            return;
        }

        $this->revealed = true;
        
        $this->votes = $this->game->votes()->with('user')->get()->toArray();

        broadcast(new VotesRevealed($this->gameId))->toOthers();
    }



    public function getListeners()
    {
        return [
            "echo:game.{$this->gameId},VoteRegistered" => 'updateVotes',
            "echo:game.{$this->gameId},VotesRevealed" => 'handleVotesRevealed',
        ];
    }

    public function handleVotesRevealed($data)
    {
        $this->revealed = true;
        $this->votes = $data['votes'];
    }

    public function updateVotes()
    {
        $this->votes = $this->game->votes()->get()->toArray();
    }

    public function getClosestWeight()
    {
        if (empty($this->votes)) {
            return null;
        }

        $average = collect($this->votes)->avg('weight');

        $availableWeights = json_decode($this->game->voting_system, true);

        $closestWeight = collect($availableWeights)->sortBy(fn($weight) => abs($weight - $average))->first();

        return $closestWeight;
    }

    public function render()
    {
        return view('livewire.poker-game')->layout('layouts.app');
    }
}
