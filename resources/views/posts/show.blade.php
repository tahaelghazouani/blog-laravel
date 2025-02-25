@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <small>Écrit par {{ $post->user->name }} - {{ $post->created_at->diffForHumans() }}</small>

    @auth
        @if(Auth::id() === $post->user_id)
            <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning mt-3">Modifier</a>
            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger mt-3">Supprimer</button>
            </form>
        @endif
    @endauth
</div>
@endsection
