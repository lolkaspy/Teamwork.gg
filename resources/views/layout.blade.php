<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Teamwork.gg</title>


    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="static/style/app.css" rel="stylesheet" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <script>
        window.onload = function() {
            var span = document.getElementsByClassName('badge');
            for (var i = 0; i < span.length; i++) {
                span[i].style.backgroundColor = 'rgb(' +
                    Math.floor(Math.random() * 200) + ',' +
                    Math.floor(Math.random() * 200) + ',' +
                    Math.floor(Math.random() * 200) + ')';
            }
        };
    </script>

</head>
<body class="antialiased body-whitesmoke">

<header class="sticky-top">
   <x-navbar/>
</header>

@yield('form')
@yield('content')

<footer class="text-lg-start panel justify-content-center d-flex footer-panel">
<x-footer-navbar/>
</footer>

</body>
</html>
