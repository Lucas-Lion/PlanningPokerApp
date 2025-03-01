<x-app-layout>
    <div class="flex justify-center mb-2">
        <div class="max-w-lg w-1/2 dark:bg-gray-800 p-6 rounded-lg shadow-lg text-white mt-8 mx-4">
            <h2 class="text-xl font-semibold mb-4">{{ $pokerGame->caption }}</h2>
            <hr class="mb-2">
            <p><strong>Criado por:</strong> {{ $pokerGame->created_by }}</p>
            <p><strong>Data de Criação:</strong> {{ $pokerGame->created_at->format('d/m/Y') }}</p>
            <p><strong>Sistema de Votação:</strong> {{ implode(', ', json_decode($pokerGame->voting_system)) }}</p>
        </div>
    </div>
    <x-footer />
</x-app-layout>