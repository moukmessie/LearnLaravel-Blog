
<header>
    @if(!Route::is('articles'))
    <li><a href="{{route('articles')}}">les articles</a></li>
    @endif

    @if(!Route::is('home'))
    <li><a href="{{route('home')}}">accueil</a></li>
    @endif

    @if(!Route::is('posts.create'))
            <li><a href="{{route('posts.create')}}">creer</a></li>
    @endif

    @if(!Route::is('contact'))
    <li><a href="{{route('contact')}}">contactez-nous</a></li>
    @endif

</header>
