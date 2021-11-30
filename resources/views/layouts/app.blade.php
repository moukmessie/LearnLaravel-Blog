<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <?php
    /**
     *  <title>{{ isset($title)?  $title . ' | ' . config('app.name')  : config('app.name') }}</title>
     *     <---!link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"--->
     */?>

    <title>{{config('app.name')}}</title>
</head>
@include('layouts/partials/_header')
<body class="py-6 flex flex-col justify-between items-center min-h-screen">
<main role="main" class="flex flex-col justify-center items-center">
    @yield('content')
</main>

@include('layouts/partials/_footer')
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>

