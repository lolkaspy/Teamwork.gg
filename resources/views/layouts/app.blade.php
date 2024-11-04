<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Teamwork.gg</title>


    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/js/animations.js'])
    <link href="{{asset('static/style/app.css')}}" rel="stylesheet" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=raleway:400,600&display=swap" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
</head>
<body class="antialiased body-whitesmoke">

<header class="sticky-top">
   <x-navbar/>
</header>

@yield('form')
@yield('content')

<x-modal-project-creator/>

<footer class="text-lg-start panel footer-panel">
<x-footer-navbar/>
</footer>


</body>
</html>
