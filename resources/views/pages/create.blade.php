@extends('layouts.app')
@section('content')

    <h2>Creation d'un post</h2>
    <form action="{{route('posts.store')}}" method="post">
        @csrf
        <input type="text" name="title" class="border-600 border-2">

        <textarea name="content" cols="30" rows="10" class="border-black-600 border-2"></textarea>
        <button type="submit" class="border-black-600 border-2">creer</button>
    </form>
@endsection
