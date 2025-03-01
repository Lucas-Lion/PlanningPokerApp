<div class="flex justify-start space-x-2">
    <!-- Botão de Visualizar -->
    <a href="{{ route('viewItem', $row->id) }}" class="p-2 dark:bg-gray-800 rounded transition duration-200 text-blue-500">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12l4.5-4.5m-9 9L12 15m0-6v6m0 0h6M6 12h6" />
        </svg>
    </a>

    <!-- Botão de Excluir -->
    <button wire:click="delete({{ $row->id }})" class="p-2 dark:bg-gray-800 rounded transition duration-200 text-red-500">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
</div>