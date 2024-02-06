@extends('layouts.main')
@section('content')
    <div class="infoPage">
        <div class="path">
            <p class="link-primary"><a href="{{ route('main') }}">Главная</a> - Личный кабинет - <span>Создать объявление</span>
            </p>
        </div>
        <div class="info">
            <h1>Новое объявление</h1>
            <p>Создав новое объявление его проверит наш администартор, после чего одобрит его либо отклонит</p>
        </div>
    </div>
    <div class="insertCreateForm">
        <form class="custom-form" action="{{ route('product.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Улица, дом</label>
                <input type="text" class="form-control" name="address" id="exampleInputEmail1"
                       value="{{ old('address') }}"
                       placeholder="Пушкина 15/2">
                @error('address')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Краткое описание</label>
                <textarea class="form-control" name="description" id="exampleInputPassword1"
                          placeholder="Какая великолепная квартира"
                          style="resize: none; height: 70px;">{{ old('description/') }}</textarea>
                @error('description')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Фотография</label>
                <input type="text" class="form-control" value="{{ old('image') }}" name="image"
                       id="exampleInputPassword1"
                       placeholder="Формат jpg или png">
                @error('image')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Цена в рублях</label>
                <input type="number" class="form-control" value="{{ old('price') }}" name="price"
                       id="exampleInputPassword1" placeholder="20000">
                @error('price')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Площадь квартиры</label>
                <input type="number" class="form-control" name="square" value="{{ old('square') }}"
                       id="exampleInputPassword1" placeholder="92">
                @error('square')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Этаж</label>
                <input type="number" class="form-control" name="floor" value="{{ old('floor') }}"
                       id="exampleInputPassword1" placeholder="3">
                @error('floor')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Кол-во этажей в доме</label>
                <input class="form-control" type="number" name="num_floors" placeholder="3">
                @error('num_floors')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Город</label>
                <input type="text" class="form-control" value="{{ old('city') }}" name="city" id="exampleInputPassword1"
                       placeholder="Магнитогорск">
                @error('city')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Срок аренды</label>
                <select class="form-select" name="time_of_agreement" aria-label="Default select example">
                    <option selected value="Любой">Любой</option>
                    <option value="Долгосрочный">Долгосрочный</option>
                    <option value="Краткосрочный">Краткосрочный</option>
                </select>
                @error('time_of_agreement')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Балкон</label>
                <select class="form-select" name="balcony" aria-label="Default select example">
                    <option selected value="false">Нет</option>
                    <option value="true">Есть</option>
                </select>
                @error('balcony')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Кол-во комнат</label>
                <input type="number" name="num_rooms" value="{{ old('num_rooms') }}" class="form-control"
                       id="exampleInputPassword1" placeholder="5">
                @error('num_rooms')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Номер телефона</label>
                <input type="text" class="form-control" value="{{ old('phone') }}" name="phone" id="phone"
                       placeholder="89095357892">
                @error('phone')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Отправить на рассмотрение</button>
        </form>
    </div>
@endsection
