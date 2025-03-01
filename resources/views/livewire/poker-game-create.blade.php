<div>

    @if (session()->has('message'))
    <div class="bg-green-700 bg-opacity-50 rounded-md p-4 mb-4 text-center" role="alert">
        <div class="text-white font-semibold">{{ session('message') }}</div>
    </div>
    @endif

    @if (session()->has('error'))
    <div class="bg-red-700 bg-opacity-50 rounded-md p-4 mb-4 text-center" role="alert">
        <div class="text-white font-semibold">{{ session('error') }}</div>
    </div>
    @endif

    <form wire:submit.prevent="save">
        <div class="mb-4">
            <label for="caption" class="block text-gray-500 mb-2">Legenda</label>
            <input type="text" id="caption" wire:model="form.caption" class="w-full border rounded px-3 py-2" required>
            @error('form.caption') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-500 mb-2">Sistema de Votação</label>
            <div class="flex flex-wrap text-white">
                @foreach($votingOptions as $option)
                <label class="flex items-center space-x-2">
                    <span class="ml-3">{{ $option }}</span>
                    <input type="checkbox" value="{{ $option }}" wire:model="form.weights" class="form-checkbox">
                </label>
                @endforeach
            </div>
            @error('form.weights') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex justify-end">
            <button type="button" wire:click="$emit('closeModal')" class="mr-2 px-4 py-2 bg-gray-600 text-white rounded">Cancelar</button>
            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Salvar</button>
        </div>
    </form>
</div>