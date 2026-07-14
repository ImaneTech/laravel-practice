<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Afficher la liste des tâches de l'utilisateur connecté.
     */
    public function index()
    {
        $tasks = Auth::user()->tasks()->latest()->get();

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Afficher le formulaire de création.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Enregistrer une nouvelle tâche.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        Auth::user()->tasks()->create([
            'title' => $request->title,
            'completed' => false,
        ]);

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Tâche créée !');
    }

    /**
     * Afficher le formulaire de modification.
     */
    public function edit(Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403);
        }

        return view('tasks.edit', compact('task'));
    }

    /**
     * Mettre à jour une tâche.
     */
    public function update(Request $request, Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $task->update([
            'title' => $request->title,
            'completed' => $request->has('completed'),
        ]);

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Tâche mise à jour !');
    }

    /**
     * Supprimer une tâche.
     */
    public function destroy(Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403);
        }

        $task->delete();

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Tâche supprimée !');
    }
}