<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Документ</title>
    <style>
        @import url(https://unpkg.com/@webpixels/css@1.1.5/dist/index.css);
        @import url("https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.4.0/font/bootstrap-icons.min.css");
    </style>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @vite(['resources/js/app.js'])
</head>
<body>
<div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
    <nav
        class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg"
        id="navbarVertical">
        <div class="container-fluid">
            <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse"
                    data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false"
                    aria-label="Переключение навигации">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand py-lg-2 mb-lg-5 px-lg-6 me-0" href="#">
                <img src="https://preview.webpixels.io/web/img/logos/clever-primary.svg" alt="...">
            </a>
            <div class="navbar-user d-lg-none">
                <div class="dropdown">
                    <a href="#" id="sidebarAvatar" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">
                        <div class="avatar-parent-child">
                            <img alt="Image Placeholder"
                                 src="https://images.unsplash.com/photo-1548142813-c348350df52b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80"
                                 class="avatar avatar- rounded-circle">
                            <span class="avatar-child avatar-badge bg-success"></span>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sidebarAvatar">
                        <a href="#" class="dropdown-item">Профиль</a>
                        <a href="#" class="dropdown-item">Настройки</a>
                        <a href="#" class="dropdown-item">Оплата</a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item">Выйти</a>
                    </div>
                </div>
            </div>
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidebarCollapse">
                <!-- Navigation -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.advertisement') }}">
                            <i class="bi bi-house"></i> Объявления
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-chat"></i> Отзывы
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa-regular fa-handshake"></i> Встречи
                            <span
                                class="badge bg-soft-primary text-primary rounded-pill d-inline-flex align-items-center ms-auto">6</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa-solid fa-right-left"></i> Консультации
                        </a>
                    </li>
                </ul>
                <!-- Divider -->
                <hr class="navbar-divider my-5 opacity-20">
                <!-- Navigation -->
                <!-- Push content down -->
                <div class="mt-auto"></div>
                <!-- User (md) -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-person-square"></i> Аккаунт
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">
                            <i class="bi bi-box-arrow-left"></i>Выйти
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main content -->
    <div class="h-screen flex-grow-1 overflow-y-lg-auto">
        <!-- Header -->
        <header class="bg-surface-primary border-bottom pt-6">
            <div class="container-fluid">
                <div class="mb-npx">
                    <div class="row align-items-center">
                        <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                            <!-- Title -->
                            <h1 class="h2 mb-0 ls-tight">Приложение</h1>
                        </div>
                        <!-- Actions -->
                        <div class="col-sm-6 col-12 text-sm-end">
                            <div class="mx-n1">
                                <a href="#" class="btn d-inline-flex btn-sm btn-neutral border-base mx-1">
                                    <span class=" pe-2">
                                        <i class="bi bi-pencil"></i>
                                    </span>
                                    <span>Изменить</span>
                                </a>
                                <a href="#" class="btn d-inline-flex btn-sm btn-primary mx-1">
                                    <span class=" pe-2">
                                        <i class="bi bi-plus"></i>
                                    </span>
                                    <span>Создать</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Nav -->
                    <ul class="nav nav-tabs mt-4 overflow-x border-0">
                        <li class="nav-item">
                            <a href="{{ route('admin.advertisement') }}" class="nav-link{{ request()->routeIs('admin.advertisement') ? ' active' : '' }}">Все объявления</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.advertisement.expected') }}" class="nav-link{{ request()->routeIs('admin.advertisement.expected') ? ' active' : '' }}">Ожидаемые объявления</a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <!-- Main -->
        <main class="py-6 bg-surface-secondary">
            @yield('content')
        </main>
    </div>
</div>
