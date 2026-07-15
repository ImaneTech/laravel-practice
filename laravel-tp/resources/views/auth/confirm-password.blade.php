<x-guest-layout>
    <!-- Petit rappel avant de confirmer le mot de passe. -->
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <!-- Formulaire de confirmation du mot de passe. -->
    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Champ mot de passe. -->
        <div>
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-4">
            <!-- Bouton de validation. -->
            <x-primary-button>
                {{ __('Confirm') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
