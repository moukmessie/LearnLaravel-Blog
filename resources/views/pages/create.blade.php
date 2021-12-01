@extends('layouts.app')
@section('content')

    <h2>Creation d'un post</h2>
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="text-red-600">{{$error}}</div>
        @endforeach
    @endif
    <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" class="border-600 border-2 block my-2">
        <textarea name="content" cols="30" rows="10" class="border-black-600 border-2 block my-2"></textarea>
        <label for="avatar">Choose a profile picture:</label>
        <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg" class="block my-2">
        <button type="submit" class="border-black-600 border-2">creer</button>
    </form>
@endsection
