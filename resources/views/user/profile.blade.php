@extends('layouts.main')
@section('content')
    <div class="infoPage">
        <div class="path">
            <p class="link-primary"><a href="{{ route('main') }}">Главная</a> - <a href="{{ route('users.index') }}">Личный кабиент</a> -
                <span>Личные данные</span>
            </p>
        </div>
        <div class="info">
            <h1>Личные данные</h1>
        </div>
    </div>

    <div class="container shadow-lg p-3 mb-5 bg-white rounded">
        <div class="row">
            <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data"
                  id="profileForm"
                  class="d-flex">
                @csrf
                @method('patch')
                <div class="col-md-3">
                    <div class="profile-left">
                        <img src="{{ asset('/storage/' . $user->image) }}" width="200" height="200" alt="Avatar"
                             class="mb-3">
                        <input style="display: none" type="file" class="form-control" id="photoInput" name="image"
                               onchange="document.getElementById('profileForm').submit()">
                        <label for="photoInput" class="btn btn-primary w-50" style="margin-left: 20px;">Сменить
                            фото</label>
                        @error('image')
                            <p class="text-danger mt-3">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="profile-left">
                        <h2>Личная информация</h2>
                        <h4 class="mt-3">Имя: <input class="form-control" name="name" type="text"
                                                     value="{{ $user->name }}"></h4>
                        @error('name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <h4 class="mt-3">Email: <input class="form-control" name="email" type="text"
                                                       value="{{ $user->email }}"></h4>
                        @error('email')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <h4 class="mt-3">Телефон: <input class="form-control" name="phone" type="text"
                                                         value="{{ $user->phone }}">
                        </h4>
                        @error('phone')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <button type="submit" class="btn btn-primary mt-3">Сохранить данные</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
