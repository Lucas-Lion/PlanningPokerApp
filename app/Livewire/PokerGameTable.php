<?php

namespace App\Livewire;

use App\Models\PokerGame;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PokerGameTable extends DataTableComponent
{
    public function getListeners()
    {
        return ['refreshTable' => '$refresh'];
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')
                ->sortable()
                ->format(fn($value) => "<div>$value</div>")
                ->html(),

            Column::make('Legenda', 'caption')
                ->sortable()
                ->format(fn($value) => "<div>$value</div>")
                ->html(),

            Column::make('Criado por')
                ->label(function ($row) {
                    return $row->user ? $row->user->name : 'Usuário desconhecido';
                })
                ->sortable()
                ->format(fn($value) => "<div class='text-center'>$value</div>")
                ->html(),

            Column::make('Data de Criação', 'created_at')
                ->sortable()
                ->format(fn($value) => "<div>$value</div>")
                ->html(),

            Column::make('Ações')
                ->label(function ($row) {
                    return view('components.action-buttons', ['row' => $row])->render();
                })
                ->html(),
        ];
    }

    public function delete($id)
    {
        try {
            $pokerGame = PokerGame::find($id);

            if ($pokerGame) {
                $pokerGame->deleted_by = Auth::id();
                $pokerGame->save();

                $pokerGame->delete();
                $this->emit('refreshComponent');
                session()->flash('message', 'Registro excluído com sucesso.');
            } else {
                session()->flash('error', 'Registro não encontrado.');
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Ocorreu um erro ao excluir o registro.');
        }
    }

    public function builder(): Builder
    {
        $pokerGames = PokerGame::query()
            ->where('created_by', Auth::id())
            ->with('user')
            ->get();

       // dd($pokerGames->first()->user); // Verifique se o relacionamento `user` está carregado

        return PokerGame::query()->where('created_by', Auth::id())->with('user');
    }
}
