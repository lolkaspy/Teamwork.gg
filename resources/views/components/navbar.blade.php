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
            <ul class="navbar-nav me-auto navbar-left">

                <li class="nav-item"><a class="nav-link" href="{{route('projects.index')}}">Проекты</a>
                </li>
                <li class="vr"></li>

                <li class="nav-item"><a class="nav-link" href="{{route('news')}}">Новости</a>
                </li>

                @admin
                <li class="nav-item"><a class="nav-link" href="{{route('admin.dashboard')}}">Панель администратора</a>
                </li>
                @endadmin
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto navbar-right">
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

                    <li class="nav-item">
                        <a class="nav-link"
                           href="">
                            <button type="button" class="btn btn-primary btn-custom" data-bs-toggle="modal" data-bs-target="#createProjectModal" onclick="return false;">
                                {{ __('Создать проект') }}
                            </button>
                        </a>
                    </li>

                    <li class="nav-item dropdown">

                        <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center gap-2"
                           href="{{route('profile')}}" role="button" data-bs-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false" v-pre>
                           <img src="{{asset(Auth::user()->photo)}}" alt="фото" height="32" width="32"/> {{ Auth::user()->login }}
                        </a>


                        <div class="dropdown-menu dropdown-menu-end text-white" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('profile') }}">
                                {{ __('Личный кабинет') }}
                            </a>
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
