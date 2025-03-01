<div class="flex justify-start space-x-2">
    <!-- Botão de Iniciar Jogo -->
    <a href="{{ route('game.view', $row->id) }}"
        class="p-2 bg-green-700 rounded transition duration-200 text-white
               hover:bg-green-600 hover:bg-opacity-50 hover:text-white hover:scale-110">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 3v18l15-9L5 3z" />
        </svg>
    </a>

    <!-- Botão de Visualizar -->
    <a href="{{ route('viewItem', $row->id) }}"
        class="p-2 bg-indigo-600 rounded transition duration-200 text-white
               hover:bg-indigo-500 hover:bg-opacity-50 hover:text-white hover:scale-110">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 4.5c-4.94 0-9 5.5-9 5.5s4.06 5.5 9 5.5 9-5.5 9-5.5-4.06-5.5-9-5.5zm0 9a3.5 3.5 0 110-7 3.5 3.5 0 010 7z" />
        </svg>
    </a>

    <!-- Botão de Excluir -->
    <button wire:click="delete({{ $row->id }})"
        class="p-2 bg-red-600 rounded transition duration-200 text-white
               hover:bg-red-500 hover:bg-opacity-50 hover:text-white hover:scale-110">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
</div>
