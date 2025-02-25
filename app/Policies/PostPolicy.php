<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;

class PostPolicy
{
    /**
     * Vérifie si l'utilisateur peut modifier l'article.
     */
    public function update(User $user, Post $post)
    {
        return $user->id === $post->user_id; // Seul l'auteur peut modifier
    }

    // Tu peux ajouter d'autres méthodes pour les autres actions si nécessaire
}
