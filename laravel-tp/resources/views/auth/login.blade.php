<x-guest-layout>
    <div class="space-y-8">
        <div>
            <h2 class="text-3xl font-semibold text-white">Connexion</h2>
        </div>

        @if (session('status'))
            <div class="rounded-2xl border border-emerald-500/30 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-200">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <div>
                <label for="email" class="mb-2 block text-sm font-medium text-slate-200">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                    class="w-full rounded-2xl border border-white/10 bg-white/5 px-4 py-3 text-white placeholder:text-slate-500 outline-none transition focus:border-cyan-400 focus:ring-2 focus:ring-cyan-400/30" />
                @error('email')
                    <p class="mt-2 text-sm text-rose-300">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="mb-2 block text-sm font-medium text-slate-200">Mot de passe</label>
                <input id="password" name="password" type="password" required autocomplete="current-password"
                    class="w-full rounded-2xl border border-white/10 bg-white/5 px-4 py-3 text-white placeholder:text-slate-500 outline-none transition focus:border-cyan-400 focus:ring-2 focus:ring-cyan-400/30" />
                @error('password')
                    <p class="mt-2 text-sm text-rose-300">{{ $message }}</p>
                @enderror
            </div>

            <div class="pt-2">
                <button type="submit" class="inline-flex w-full items-center justify-center rounded-2xl bg-cyan-400 px-5 py-3 text-sm font-semibold text-slate-950 transition hover:bg-cyan-300">
                    Entrer
                </button>
            </div>

            <p class="pt-2 text-sm text-slate-400">
                Pas de compte ?
                <a href="{{ route('register') }}" class="font-semibold text-cyan-300 underline decoration-cyan-500/40 underline-offset-4 hover:text-cyan-200">S'inscrire</a>
            </p>
        </form>
    </div>
</x-guest-layout>
