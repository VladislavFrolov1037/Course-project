@extends('layouts.main')
@section('content')
    <div class="infoPage">
        <div class="path">
            <p class="link-primary"><a href="{{ route('main') }}">Главная</a> - <a href="{{ route('users.index') }}">Личный
                    кабинет</a> -
                <span>Мои объявления</span>
            </p>
        </div>
        <div class="info">
            <h1>Мои объявления</h1>
            @if (count($advertisements) === 0)
                <h4>У вас нет объявлений, хотите <a href="{{ route('advertisements.create') }}">создать</a>?</h4>
            @endif
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            @foreach($advertisements as $advertisement)
                @include('components.advertisements.advertisements', ['routeLink' => 'advertisements.show'])
            @endforeach
        </div>
    </div>
@endsection
