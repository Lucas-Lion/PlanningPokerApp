<div>
    <div class="flex justify-center mb-2">
        <div class="max-w-lg w-1/2 dark:bg-gray-800 p-6 rounded-lg shadow-lg text-white mt-8 mx-4">
            <h1 class="text-xl font-semibold mb-4">Planning Poker</h1>
            <hr class="mb-2">

            <div class="mt-4">
                <h2 class="text-lg font-semibold mb-2">Vote no peso:</h2>
                <div class="grid grid-cols-3 gap-4">
                    @foreach(collect($votingOptions)->sort() as $weight)
                    <button wire:click="vote({{ $weight }})"
                        class="font-bold py-4 px-6 rounded-lg shadow-lg transition duration-200 ease-in-out transform hover:scale-105
{{ collect($votes)->where('user_id', auth()->id())->pluck('weight')->first() == $weight ? 'bg-green-500 text-white' : 'bg-white text-blue-500 hover:bg-gray-300' }}">
                        {{ $weight }}
                    </button>
                    @endforeach
                </div>
            </div>

            @if($revealed)
            <div class="mt-4">
                <h2 class="text-lg font-semibold mb-2">Votos:</h2>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    @foreach($votes as $vote)
                    <div class="bg-gray-700 p-4 rounded-lg shadow-md text-center">
                        <p class="font-bold text-white">
                            {{ is_array($vote['user']) ? ($vote['user']['name'] ?? 'Usuário desconhecido') : $vote['user'] }}
                        </p>
                        <p class="text-green-400 text-xl font-semibold mt-2">{{ $vote['weight'] }}</p>
                    </div>
                    @endforeach
                </div>
                <p class="mt-4 text-lg font-semibold text-white">
                    <strong>Peso final escolhido:</strong> <span class="text-green-400">{{ $this->getClosestWeight() }}</span>
                </p>
            </div>
            @endif

            @if(Auth::id() === $game->created_by)
            <div class="mt-4">
                <button wire:click="revealVotes" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg">
                    Revelar Votos
                </button>
            </div>
            @endif
        </div>
    </div>
    <x-footer />
</div>
