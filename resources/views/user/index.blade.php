@extends('layouts.main')
@section('content')
    <div class="infoPage">
        <div class="path">
            <p class="link-primary"><a href="{{ route('main') }}">Главная</a> -
                <span>Личный кабинет</span>
            </p>
        </div>
        <div class="info">
            <h1>Личный кабинет</h1>
        </div>
    </div>
    <div class="container shadow-lg p-3 mb-5 bg-white rounded">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-left">
                    <img src="{{ asset('/storage/' . $user->image) }}" width="200" height="200" alt="Avatar" class="mb-3">
                    <h2>Личная информация</h2>
                    <p class="mt-1">Имя: {{ $user->name }}</p>
                    <p class="mt-1">Email: {{ $user->email }}</p>
                    <p class="mt-1">Телефон: {{ $user->phone }}</p>
                    <a href="{{ route('user.edit') }}" class="btn btn-primary mt-3">Редактировать данные</a>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <h3 class="text-center">Мои объявления</h3>

                    @if(count($advertisements) > 0)
                        @foreach($advertisements->take(1) as $advertisement)
                            <div class="col-md-3"></div>
                            @include('components.advertisements.advertisements', ['routeLink' => 'advertisement.show', 'columnWidth' => 6])
                        @endforeach
                        <div class="text-center">
                            <a href="{{ route('user.advertisements') }}" class="btn btn-primary w-50">Посмотреть все мои
                                объявления</a>
                        </div>
                    @else
                        <div class="text-center">
                            <h5>У вас нет объявлений.</h5>
                            <a href="{{ route('advertisement.create') }}" class="btn btn-primary">Создать объявление</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">

            </div>
        </div>
    </div>
@endsection
