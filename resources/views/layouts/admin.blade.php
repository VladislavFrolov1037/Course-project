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

    <style>
        .nav-tabs .nav-link {
            border: none;
            background-color: #f8f9fa;
            color: #000;
            border-radius: 10px;
            padding: 10px 15px;
            margin-right: 10px;
            transition: all 0.3s ease-in-out;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        }

        .nav-tabs .nav-link.active {
            background-color: #007bff;
            color: #fff;
            box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.4);
        }

        .nav-tabs .nav-link:hover {
            background-color: #cce7ff;
            color: #000;
            box-shadow: 3px 3px 7px rgba(0, 0, 0, 0.4);
        }

        .nav-tabs {
            border-bottom: none;
        }
    </style>
</head>
<body>
<header class="shadow p-2 mb-5 bg-white rounded">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('admin.index') }}">Админка</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
                @auth
                    <div class="navbar-nav personalAcc">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                               aria-expanded="false">
                                Каталог
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item"
                                       href="{{ route('admin.advertisements.index') }}">Объявления</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('admin.reviews.index') }}">Отзывы</a>
                                </li>
                                <li></li>
                                <a class="dropdown-item"
                                   href="{{ route('admin.consultations.index') }}">Консультации</a>
                                <li></li>
                                <a class="dropdown-item"
                                   href="{{ route('admin.meetings.index') }}">Встречи</a>
                                <li></li>
                                <a class="dropdown-item" href="{{ route('admin.feedbacks.index') }}">Идеи</a>
                            </ul>
                        </li>


                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                                   data-bs-toggle="dropdown" aria-expanded="false">
                                    Профиль
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                                    <li><a class="dropdown-item" href="{{ route('users.index') }}">Личный
                                            кабинет</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}">Выйти</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                @endauth
            </div>
        </div>
    </nav>
</header>
<main>
    @yield('content')
</main>
<footer>
</footer>

<script src="{{ asset('assets/js/sendForm.js') }}"></script>
</body>
</html>
