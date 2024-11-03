<x-app-layout>
    <div x-data="{ showModal: false, showMessage: false, message: '' }" class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between mb-4">
                <h1 class="text-white text-2xl">Listagem pokers</h1>
                <button @click="showModal = true" class="inline-flex items-center px-4 py-2 bg-green-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m-7-7h14" />
                    </svg>
                    Cadastrar
                </button>
            </div>

            <div x-show="showModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 z-50">
                <div class="dark:bg-gray-800 rounded-lg shadow-lg p-6 w-1/3">
                    <h2 class="text-xl text-white mb-4">Cadastrar Poker Planning</h2>
                    <hr class="mb-3">
                    <livewire:poker-game-create />
                </div>
            </div>

            <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                @livewire('poker-game-table', ['listeners' => ['refreshTable' => '$refresh']])
            </div>
        </div>
    </div>

    <x-footer />
</x-app-layout>