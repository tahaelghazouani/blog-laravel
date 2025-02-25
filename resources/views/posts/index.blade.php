@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Liste des Articles</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Créer un article</a>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->user->name }}</td>
                        <td>{{ $post->created_at->format('d/m/Y') }}</td>
                        <td>
                            <!-- Bouton Voir -->
                            <a href="{{ route('posts.show', $post) }}" class="btn btn-info btn-sm">Voir</a>

                            @auth
                                @if(Auth::id() === $post->user_id)
                                    <!-- Bouton Modifier -->
                                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning btn-sm">Modifier</a>

                                    <!-- Bouton Supprimer -->
                                    <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" 
                                            onclick="return confirm('Voulez-vous vraiment supprimer cet article ?');">
                                            Supprimer
                                        </button>
                                    </form>
                                @endif
                            @endauth
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $posts->links() }}
    </div>
</div>
@endsection
