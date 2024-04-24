@extends('layouts.main')
@section('content')
    <div class="infoPage">
        <div class="path">
            <p class="link-primary"><a href="{{ route('main') }}">Главная</a> - Пользователь -
                <span>Сброс пароля</span>
            </p>
        </div>
        <div class="info">
            <h1>Сброс пароля</h1>
            <p>Новый пароль придет вам на почту</p>
        </div>
    </div>
    <div class="register">
        <form class="custom-form1" action="{{ route('reset') }}" method="post">
            @csrf
            @method('patch')
            <h4 class="mb-2">Сброс пароля</h4>
            <div class="form-group mb-2">
                <label for="exampleInputPassword1">Почта</label>
                <input type="email" class="form-control" value="{{ old('email') }}" id="exampleInputPassword1"
                       name="email" placeholder="Почта">
                @error('email')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-2">Получить новый пароль</button>
        </form>
    </div>
@endsection
