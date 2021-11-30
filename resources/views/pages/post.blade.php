@extends('layouts.app')

@section('content')
    <h1>Article</h1>
    <h2>{{$post->content}}</h2>
        <span>{{$post->image ? $post->image->path : "Pas d'image"}}</span>

    @forelse($post->comments as $comment)
        <span>{{$comment->content}} | <i>crée le {{$comment->created_at->format('d-m-Y')}}</i></span>
    @empty
        <span>Pas de commentaire</span>
    @endforelse

    <hr>
        @forelse($post->tags as $tag)
            <span class="text-blue-800"><a href="#">#{{$tag->name}}</a></span>
        @empty
            <span>Pas de tags pour ce post</span>
        @endforelse


@endsection
