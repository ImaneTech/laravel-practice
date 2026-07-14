<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Todo List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen py-10">
    <div class="max-w-2xl mx-auto bg-white rounded-xl shadow-md p-6">

        <h1 class="text-2xl font-bold text-gray-800 mb-6">📝 Ma Todo List</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-2 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('tasks.create') }}"
           class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg mb-6 transition">
            + Nouvelle tâche
        </a>

        <ul class="space-y-3">
            @forelse($tasks as $task)
                <li class="flex items-center justify-between border border-gray-200 rounded-lg px-4 py-3 hover:bg-gray-50 transition">
                    <div>
                        <p class="font-medium text-gray-800">{{ $task->title }}</p>
                        @if($task->completed)
                            <span class="text-xs bg-green-100 text-green-700 px-2 py-0.5 rounded-full">✅ Terminée</span>
                        @else
                            <span class="text-xs bg-yellow-100 text-yellow-700 px-2 py-0.5 rounded-full">⏳ En attente</span>
                        @endif
                    </div>

                    <div class="flex gap-2">
                        <a href="{{ route('tasks.edit', $task) }}"
                           class="text-sm bg-gray-200 hover:bg-gray-300 px-3 py-1.5 rounded-lg transition">
                            Modifier
                        </a>
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Supprimer ?')"
                                class="text-sm bg-red-100 hover:bg-red-200 text-red-700 px-3 py-1.5 rounded-lg transition">
                                Supprimer
                            </button>
                        </form>
                    </div>
                </li>
            @empty
                <li class="text-gray-400 text-center py-8">Aucune tâche pour le moment.</li>
            @endforelse
        </ul>
    </div>
</body>
</html>