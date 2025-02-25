<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Afficher la liste des articles.
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    /**
     * Afficher le formulaire de création d'un article.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Stocker un nouvel article dans la base de données.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('posts.index')->with('success', 'Article créé avec succès.');
    }

    /**
     * Afficher un article spécifique.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Afficher le formulaire d'édition d'un article.
     */
    public function edit(Post $post)
{
    if (Auth::id() !== $post->user_id) {
        abort(403, 'Accès refusé');
    }
    return view('posts.edit', compact('post'));
}


    /**
     * Mettre à jour un article dans la base de données.
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post->update($request->only(['title', 'content']));

        return redirect()->route('posts.index')->with('success', 'Article mis à jour.');
    }

    /**
     * Supprimer un article.
     */
    public function destroy(Post $post)
    {
        // Vérifie si l'utilisateur est l'auteur
        if (Auth::id() !== $post->user_id) {
            abort(403, 'Vous n\'êtes pas autorisé à supprimer cet article.');
        }
    
        $post->delete();
    
        return redirect()->route('posts.index')->with('success', 'Article supprimé avec succès.');
    }
    
}