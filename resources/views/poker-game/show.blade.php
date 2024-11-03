<x-app-layout>
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-xl font-semibold mb-4">{{ $pokerGame->caption }}</h2>
        <p><strong>Criado por:</strong> {{ $pokerGame->created_by }}</p>
        <p><strong>Data de Criação:</strong> {{ $pokerGame->created_at->format('d/m/Y H:i') }}</p>
        <p><strong>Sistema de Votação:</strong> {{ implode(', ', json_decode($pokerGame->voting_system)) }}</p>
    </div>
</x-app-layout>