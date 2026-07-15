<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $user_id
 * @property-read User|null $user
 */
class Task extends Model
{
    use HasFactory;

    // Champs autorisés pour l'enregistrement en masse.
    protected $fillable = [
        'title',
        'description',
        'completed',
        'user_id',
    ];

    // Une tâche appartient à un utilisateur.
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}