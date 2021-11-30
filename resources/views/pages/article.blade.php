@extends('layouts.app')

@section('content')
    <h1>Article</h1>
    <h2>{{$post->content}}</h2>


    @forelse($post->comments as $comment)
        <span>{{$comment->content}} | <i>crée le {{$comment->created_at->format('d-m-Y')}}</i></span>
    @empty
        <span>Pas de commentaire</span>
    @endforelse
@endsection
