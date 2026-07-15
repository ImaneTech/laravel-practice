<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Page d'accueil : on envoie directement vers la connexion.
Route::get('/', function () {
    return redirect()->route('login');
});

// Après connexion, l'utilisateur arrive sur la liste des tâches.
Route::get('/dashboard', function () {
    return redirect()->route('tasks.index');
})->middleware(['auth', 'verified'])->name('dashboard');

// Toutes les routes ci-dessous demandent une connexion.
Route::middleware('auth')->group(function () {
    // Page profil pour modifier les informations du compte.
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD complet des tâches.
    Route::resource('tasks', TaskController::class);
});

// Routes de connexion, inscription et mot de passe oublié.
require __DIR__.'/auth.php';