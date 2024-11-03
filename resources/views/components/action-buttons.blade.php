<div class="flex space-x-2">
    <a href="{{ route('poker-game.show', $id) }}" class="text-blue-500 hover:text-blue-700">Visualizar</a>
    <button wire:click="delete({{ $id }})" class="text-red-500 hover:text-red-700">Excluir</button>
</div>