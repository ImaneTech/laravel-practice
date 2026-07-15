<x-guest-layout>
    <div class="space-y-8">
        <div>
            <!-- Titre principal de la page de connexion. -->
            <h2 class="text-3xl font-semibold text-white">Connexion</h2>
        </div>

        <!-- Message de session si un statut est présent. -->
        @if (session('status'))
            <div class="rounded-2xl border border-emerald-500/30 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-200">
                {{ session('status') }}
            </div>
        @endif

        <!-- Formulaire de connexion. -->
        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <!-- Champ e-mail. -->
            <div>
                <label for="email" class="mb-2 block text-sm font-medium text-slate-200">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                    class="w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 text-slate-900 placeholder:text-slate-400 outline-none transition focus:border-cyan-400 focus:ring-2 focus:ring-cyan-400/30" />
                @error('email')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Champ mot de passe. -->
            <div>
                <label for="password" class="mb-2 block text-sm font-medium text-slate-200">Mot de passe</label>
                <input id="password" name="password" type="password" required autocomplete="current-password"
                    class="w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 text-slate-900 placeholder:text-slate-400 outline-none transition focus:border-cyan-400 focus:ring-2 focus:ring-cyan-400/30" />
                @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Bouton d'envoi du formulaire. -->
            <div class="pt-2">
                <button type="submit" class="inline-flex w-full items-center justify-center rounded-2xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-blue-500">
                    Entrer
                </button>
            </div>

            <!-- Lien vers l'inscription. -->
            <p class="pt-2 text-sm text-slate-400">
                Pas de compte ?
                <a href="{{ route('register') }}" class="font-semibold text-cyan-300 underline decoration-cyan-500/40 underline-offset-4 hover:text-cyan-200">S'inscrire</a>
            </p>
        </form>
    </div>
</x-guest-layout>
