<x-guest-layout>
    <!-- Explication courte pour demander l'email de réinitialisation. -->
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Message de confirmation si le lien a été envoyé. -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Formulaire pour recevoir le lien par e-mail. -->
    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Champ e-mail. -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <!-- Bouton d'envoi du lien. -->
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
