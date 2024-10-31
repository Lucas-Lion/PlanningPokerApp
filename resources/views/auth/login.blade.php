<x-guest-layout>
    <x-authentication-card>

            <x-slot name="logo">
            <div class="flex justify-center flex-col items-center">
                <x-authentication-card-logo />
                <h1 class="mt-2 text-2xl font-semibold text-gray-700">Planning Poker</h1>
                </div>
            </x-slot>
       
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Senha') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <x-validation-errors class="mb-4" />

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('register'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}">
                        {{ __('Cadastre-se') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('Acessar') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>