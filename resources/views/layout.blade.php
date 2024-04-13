<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Teamwork.gg</title>

    <link href="static/style/app.css" rel="stylesheet" />
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <script>
        window.onload = function() {
            var span = document.getElementsByTagName('span');
            for (var i = 0; i < span.length; i++) {
                span[i].style.backgroundColor = 'rgb(' +
                    Math.floor(Math.random() * 200) + ',' +
                    Math.floor(Math.random() * 200) + ',' +
                    Math.floor(Math.random() * 200) + ')';
            }
        };
    </script>

</head>
<body class="antialiased">
<header class="sticky-top">
    <nav class="navbar navbar-light navbar-expand-lg panel">
        <div class="container">
            <a class="navbar-brand" href="{{route('welcome')}}">
                Главная</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="{{route('projects')}}">Проекты</a>
                    </li>
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Войти') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link"
                                   href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                            </li>
                        @endif
                    @else

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white"
                               href="{{route('profile')}}" role="button" data-bs-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false" v-pre>
                                Логин
                            </a>
                            <div class="dropdown-menu dropdown-menu-end text-white" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Выход') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="container">
    @yield('content')
</div>

<footer class="text-center text-lg-start fixed-bottom panel">----</footer>

</body>
</html>
