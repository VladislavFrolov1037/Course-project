<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    @vite('resources/js/app.js')
</head>
<body>
<header class="shadow p-2 mb-5 bg-white rounded">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('main') }}">Магазин</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('main') }}">Главная</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="catalogDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            Каталог
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="catalogDropdown">
                            <li><a class="dropdown-item" href="{{ route('advertisements.index') }}">Объявления</a></li>
                            <li><a class="dropdown-item" href="{{ route('reviews.index') }}">Отзывы</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('aboutUs') }}">О нас</a>
                    </li>
                    @guest
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                Пользователь
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href=" {{ route('register') }} ">Регистрация</a></li>
                                <li><a class="dropdown-item" href=" {{ route('login') }} ">Авторизация</a></li>
                            </ul>
                        </li>
                    @endguest
                </ul>
                <div class="navbar-nav ml-auto personalAcc">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('favourites') }}">Избранное</a>
                        </li>
                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                                   data-bs-toggle="dropdown" aria-expanded="false">
                                    Профиль
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                                    @can('view', auth()->user())
                                        <li><a class="dropdown-item" href="{{ route('admin.index') }}">Админ панель</a>
                                        </li>
                                    @endcan
                                    <li><a class="dropdown-item" href="{{ route('users.index') }}">Личный кабинет</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('users.advertisements') }}">Мои
                                            объявления</a></li>
                                    <li><a class="dropdown-item" href="{{ route('users.reviews') }}">Мои отзывы</a></li>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}">Выйти</a></li>
                                </ul>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
<main>

    @yield('content')

</main>
<footer class="text-white text-center py-3">
    <div class="container">
        <div class="row">
            <div class="col">
                <p>© {{ date('Y') }} ООО "Недвижимость Мгн". Все права защищены.</p>
            </div>
        </div>
    </div>
</footer>


<script src="{{ asset('assets/js/sendForm.js') }}"></script>
</body>

</html>





