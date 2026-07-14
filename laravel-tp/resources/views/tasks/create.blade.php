<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nouvelle tâche</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen py-10">
    <div class="max-w-md mx-auto bg-white rounded-xl shadow-md p-6">

        <h1 class="text-xl font-bold text-gray-800 mb-6">Nouvelle tâche</h1>

        @if($errors->any())
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded-lg mb-4 text-sm">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('tasks.store') }}" method="POST" class="space-y-4">
            @csrf
            <input type="text" name="title" placeholder="Titre de la tâche" value="{{ old('title') }}"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">

            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg transition">
                Create
            </button>
        </form>

        <a href="{{ route('tasks.index') }}" class="block text-center text-sm text-gray-500 hover:text-gray-700 mt-4">
            ← Retour
        </a>
    </div>
</body>
</html>