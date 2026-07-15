<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    // Récupère l'utilisateur connecté avec un vrai type User.
    private function user(): User
    {
        $user = Auth::user();

        abort_unless($user instanceof User, 403);

        return $user;
    }

    /**
     * Afficher la liste des tâches de l'utilisateur connecté.
     */
    public function index()
    {
        // On récupère uniquement les tâches du compte connecté.
        $tasks = $this->user()->tasks()->latest()->get();

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Afficher le formulaire de création.
     */
    public function create()
    {
        // On affiche simplement le formulaire vide.
        return view('tasks.create');
    }

    /**
     * Enregistrer une nouvelle tâche.
     */
    public function store(Request $request)
    {
        // On vérifie que le titre est rempli avant d'enregistrer.
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        // La tâche est liée à l'utilisateur connecté.
        $this->user()->tasks()->create([
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
        // Sécurité simple : un utilisateur ne modifie que ses propres tâches.
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
        // Même contrôle d'accès que pour l'édition.
        if ($task->user_id !== Auth::id()) {
            abort(403);
        }

        // Le titre reste obligatoire lors de la mise à jour.
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        // On met à jour le titre et l'état terminé / non terminé.
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
        // On empêche la suppression des tâches qui n'appartiennent pas à l'utilisateur.
        if ($task->user_id !== Auth::id()) {
            abort(403);
        }

        // Suppression définitive de la tâche.
        $task->delete();

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Tâche supprimée !');
    }
}