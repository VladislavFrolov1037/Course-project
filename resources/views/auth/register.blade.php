@extends('layouts.main')
@section('content')
    <div class="infoPage">
        <div class="path">
            <p class="link-primary"><a href="{{ route('main') }}">Главная</a> -
                <span>Регистрация</span>
            </p>
        </div>
        <div class="info">
            <h1>Регистрация</h1>
            <p>Регистрация позволяет выкладывать собственные объявления о аренде вашей недвижимости, а также оставить отзыв о
                работе нашей компании</p>
        </div>
    </div>
    <div class="register">
        <form class="custom-form1" action="{{ route('register') }}" method="post" enctype="multipart/form-data" novalidate>
            @csrf
            <h3>Регистрация</h3>
            <div class="form-group mb-2">
                <label for="exampleInputEmail1">Имя</label>
                <input type="text" class="form-control" value="{{ old('name') }}" id="exampleInputEmail1" name="name"
                       aria-describedby="emailHelp"
                       placeholder="Имя">
                @error('name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="exampleInputPassword1">Почта</label>
                <input type="email" class="form-control" value="{{ old('email') }}" id="exampleInputPassword1"
                       name="email" placeholder="Почта">
                @error('email')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="exampleInputPassword1">Телефон</label>
                <input type="text" class="form-control" value="{{ old('phone') }}" id="exampleInputPassword1"
                       name="phone" placeholder="Телефон">
                @error('phone')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="exampleInputPassword1">Аватарка</label>
                <input type="file" class="form-control" value="{{ old('image') }}" id="exampleInputPassword1"
                       name="image" placeholder="Аватарка">
                @error('image')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="exampleInputPassword1">Пароль</label>
                <input type="password" class="form-control" id="exampleInputPassword1"
                       name="password"
                       placeholder="Пароль">
                @error('password')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="exampleInputPassword1">Повторите пароль</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password_confirmation"
                       placeholder="Повторите пароль">
                @error('password_confirmation')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100 mt-3">Зарегистрироваться</button>
            <small>
                <a href="{{ route('login') }}">Уже есть аккаунт?</a>
            </small>
        </form>
    </div>
@endsection
