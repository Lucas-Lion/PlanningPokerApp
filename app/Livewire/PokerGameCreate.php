<?php

namespace App\Livewire;

use App\Livewire\Forms\PokerGameForm;
use Livewire\Component;
use App\Models\PokerGame;
use Illuminate\Support\Facades\Auth;

class PokerGameCreate extends Component
{
    public PokerGameForm $form;
    public array $votingOptions = [1, 2, 3, 5, 8, 13, 20];

    public function mount()
    {
        $this->form = new PokerGameForm(component: $this, propertyName: 'form');
        $this->form->created_by = Auth::id();
    }

    public function save()
    {
        $this->validate();

        try {
            PokerGame::create([
                'caption' => $this->form->caption,
                'voting_system' => json_encode($this->form->weights),
                'created_by' => $this->form->created_by,
            ]);

            session()->flash('message', 'Poker game criado com sucesso!');
        } catch (\Exception $e) {
            session()->flash('error', 'Ocorreu um erro ao cadastrar o poker game.');
        }

        $this->form = new PokerGameForm(component: $this, propertyName: 'form');
        $this->dispatch('closeModal');
        $this->dispatch('refreshTable');
    }

    public function render()
    {
        return view('livewire.poker-game-create');
    }
}
