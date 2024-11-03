<?php

namespace App\Livewire;

use App\Models\PokerGame;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PokerGameTable extends DataTableComponent
{
    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')->sortable(),
            Column::make('Legenda', 'caption')->sortable(),
            Column::make('Criado por', 'created_by')->sortable(),
            Column::make('Data de Criação', 'created_at')->sortable(),
            Column::make('Ações')
                ->format(function ($value, $column, $row) {
                    return view('components.action-buttons', ['id' => $row->id]);
                }),
        ];
    }

    public function delete($id)
    {
        try {
            $pokerGame = PokerGame::find($id);

            if ($pokerGame) {
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
        return PokerGame::query();
    }
}
