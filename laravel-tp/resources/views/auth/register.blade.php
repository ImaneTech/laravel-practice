<x-guest-layout>
    <div class="space-y-8">
        <div>
            <h2 class="text-3xl font-semibold text-white">Inscription</h2>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <div>
                <label for="name" class="mb-2 block text-sm font-medium text-slate-200">Nom</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus autocomplete="name"
                    class="w-full rounded-2xl border border-white/10 bg-white/5 px-4 py-3 text-white placeholder:text-slate-500 outline-none transition focus:border-cyan-400 focus:ring-2 focus:ring-cyan-400/30" />
                @error('name')
                    <p class="mt-2 text-sm text-rose-300">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="mb-2 block text-sm font-medium text-slate-200">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="username"
                    class="w-full rounded-2xl border border-white/10 bg-white/5 px-4 py-3 text-white placeholder:text-slate-500 outline-none transition focus:border-cyan-400 focus:ring-2 focus:ring-cyan-400/30" />
                @error('email')
                    <p class="mt-2 text-sm text-rose-300">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="mb-2 block text-sm font-medium text-slate-200">Mot de passe</label>
                <input id="password" name="password" type="password" required autocomplete="new-password"
                    class="w-full rounded-2xl border border-white/10 bg-white/5 px-4 py-3 text-white placeholder:text-slate-500 outline-none transition focus:border-cyan-400 focus:ring-2 focus:ring-cyan-400/30" />
                @error('password')
                    <p class="mt-2 text-sm text-rose-300">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="mb-2 block text-sm font-medium text-slate-200">Confirmer</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password"
                    class="w-full rounded-2xl border border-white/10 bg-white/5 px-4 py-3 text-white placeholder:text-slate-500 outline-none transition focus:border-cyan-400 focus:ring-2 focus:ring-cyan-400/30" />
                @error('password_confirmation')
                    <p class="mt-2 text-sm text-rose-300">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col gap-3 pt-2 sm:flex-row sm:items-center sm:justify-between">
                <a href="{{ route('login') }}" class="text-sm text-slate-400 underline decoration-slate-600 underline-offset-4 transition hover:text-cyan-300">
                    Déjà inscrit ?
                </a>

                <button type="submit" class="inline-flex items-center justify-center rounded-2xl bg-cyan-400 px-5 py-3 text-sm font-semibold text-slate-950 transition hover:bg-cyan-300">
                    S'inscrire
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>
