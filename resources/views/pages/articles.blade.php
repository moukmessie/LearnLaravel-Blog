@extends('layouts.app')

@section('content')
    <h1>LES ARTICLES</h1>

    <h2>Les Postes</h2>
    @if(count($posts)>0)
        @foreach($posts as $post)
            <p class="text-red-600 hover:text-blue-600"><a href="{{route('article_post',['id'=>$post->id])}}">{{$post->title}}</a></p>
        @endforeach
    @else
    <p class="text-red-600">Pas de post</p>
    @endif
    <h2>Les videos</h2>
    @if(count($videos)>0)
        @foreach($videos as $video)
    <p class="text-green-600 hover:text-blue-600"><a href="{{route('article_video',['id'=>$video->id])}}">{{$video->title}}</a></p>
        @endforeach
    @else
        <p class="text-red-600">Pas de post</p>
    @endif
@endsection
