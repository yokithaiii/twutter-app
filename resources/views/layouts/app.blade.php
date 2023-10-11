<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Twutter</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @routes
    @vite(['resources/sass/app.scss', 'resources/js/app.js', "resources/js/Pages/Message/Index.vue"])

</head>
<body class="bg-dark">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-dark shadow-sm">
            <div class="container">

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto align-items-center">
                        <li>
                            <a class="fs-4 nav-link px-2 text-white" href="{{ url('/') }}">
                                Twutter
                            </a>
                        </li>
                        <li>
                            <a class="nav-link px-2 text-white" href="{{ route('users.index') }}">Пользователи</a>
                        </li>
                        <li>
                            <a class="nav-link px-2 text-white" href="{{ route('messages.index') }}">Сообщения</a>
                        </li>
                        <li>
                            <a class="nav-link px-2 text-white" href="{{ route('friends.index') }}">Друзья</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('login') }}">Логин</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('register') }}">Регистрация</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img src="/storage/{{ Auth::user()->avatar }}" alt="mdo" width="32" height="32" class="rounded-circle">
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end bg-dark" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item bg-dark text-white" href="{{ route('profile.index') }}">Профиль</a>
                                    <a class="dropdown-item bg-dark text-danger" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Выйти
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

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-3">
                    </div>
                    <div class="col-6">
                        @yield('content')
                    </div>
                    <div class="col-3"></div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
