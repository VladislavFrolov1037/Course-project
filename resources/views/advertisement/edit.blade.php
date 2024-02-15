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
        <form class="custom-form" action="{{ route('advertisement.update', $advertisement->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Улица, дом</label>
                <input type="text" class="form-control" name="address" value="{{ $advertisement->address }}"
                       id="exampleInputEmail1"
                       aria-describedby="emailHelp"
                       placeholder="Пушкина 15/2">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Краткое описание</label>
                <textarea class="form-control" name="description" id="exampleInputPassword1"
                          placeholder="Какая великолепная квартира"
                          style="resize: none; height: 70px;">{{ $advertisement->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Фотография</label>
                <input type="text" class="form-control" name="image" value="{{ $advertisement->image }}"
                       id="exampleInputPassword1"
                       placeholder="Формат jpg или png">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Цена в рублях</label>
                <input type="number" class="form-control" name="price" value="{{ $advertisement->price }}"
                       id="exampleInputPassword1" placeholder="20000">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Площадь квартиры</label>
                <input type="number" class="form-control" name="square" value="{{ $advertisement->square }}"
                       id="exampleInputPassword1" placeholder="92">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Этаж</label>
                <input type="number" class="form-control" name="floor" value="{{ $advertisement->floor }}"
                       id="exampleInputPassword1" placeholder="3">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Кол-во этажей в доме</label>
                <select class="form-select" name="num_floors" aria-label="Default select example">
                    <option value="5" {{ ($advertisement->num_floors == '5') ? 'selected' : '' }}>5</option>
                    <option value="9" {{ ($advertisement->num_floors == '9') ? 'selected' : '' }}>9</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Город</label>
                <input type="text" class="form-control" value="{{ $advertisement->city }}" name="city"
                       id="exampleInputPassword1"
                       placeholder="Магнитогорск">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Срок аренды</label>
                <select class="form-select" name="time_of_agreement" aria-label="Default select example">
                    <option value="any" {{ ($advertisement->time_of_agreement == 'any') ? 'selected' : '' }}>Любой</option>
                    <option value="long" {{ ($advertisement->time_of_agreement == 'long') ? 'selected' : '' }}>Долгосрочный
                    </option>
                    <option value="short" {{ ($advertisement->time_of_agreement == 'short') ? 'selected' : '' }}>
                        Краткосрочный
                    </option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Балкон</label>
                <select class="form-select" name="balcony" aria-label="Default select example">
                    <option value="false" {{ $advertisement->balcony == '0' ? 'selected' : '' }}>Нет</option>
                    <option value="true" {{ $advertisement->balcony == '1' ? 'selected' : '' }}>Есть</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Кол-во комнат</label>
                <input type="number" name="num_rooms" value="{{ $advertisement->num_rooms }}" class="form-control"
                       id="exampleInputPassword1" placeholder="5">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Номер телефона</label>
                <input type="text" class="form-control" value="{{ $advertisement->phone }}" name="phone" id="phone"
                       placeholder="89095357892">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
