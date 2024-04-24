@extends('layouts.main')
@section('content')
    <div class="infoPage">
        <div class="path">
            <p class="link-primary"><a href="{{ route('main') }}">Главная</a> - Пользователь -
                <span>Авторизация</span>
            </p>
        </div>
        <div class="info">
            <h1>Авторизация</h1>
            <p>Авторизация позволяет выкладывать собственные объявления о аренде ваших квартир, а также оставить отзыв о работе нашей компании</p>
        </div>
    </div>
    <div class="register">
        <form class="custom-form1" action="{{ route('login') }}" method="post">
            @csrf
            <h3>Авторизация</h3>
            <div class="form-group mb-2">
                <label for="exampleInputPassword1">Почта</label>
                <input type="email" class="form-control" value="{{ old('email') }}" id="exampleInputPassword1" name="email" placeholder="Почта">
                @error('email')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="exampleInputPassword1">Пароль</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password"
                       placeholder="Пароль">
                @error('password')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100 mt-3">Авторизоваться</button>
            <small>
                <a href="{{ route('editPassword') }}">Забыли пароль?</a>
                <a href="{{ route('register') }}" style="margin-left: 10px;">Нет аккаунта?</a>
            </small>
        </form>
    </div>
@endsection
