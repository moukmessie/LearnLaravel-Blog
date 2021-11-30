@extends('layouts.app')

@section('content')
    <h2>{{$video->url}}</h2>
    @forelse($video->comments as $comment)
        <span>{{$comment->content}} | <i>crée le {{$comment->created_at->format('d-m-Y')}}</i></span>
    @empty
        <span>Pas de video</span>
    @endforelse
@endsection
