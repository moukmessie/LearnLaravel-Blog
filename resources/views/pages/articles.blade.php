@extends('layouts.app')

@section('content')
    <h1>LES ARTICLES</h1>
    @if(count($posts)>0)
        @foreach($posts as $post)
            <p class="text-red-600 hover:text-blue-600"><a href="{{route('article',['id'=>$post->id])}}">{{$post->title}}</a></p>
        @endforeach
    @else
    <p class="text-red-600">Pas de post</p>
    @endif
@endsection
