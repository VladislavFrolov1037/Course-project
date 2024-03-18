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
            <p>В личном кабинете можно редактировать личную информацию, а также посмотреть свои объявления</p>
        </div>
    </div>
    <div class="container shadow-lg p-3 mb-5 bg-white rounded">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-left">
                    <img src="{{ asset('/storage/' . $user->image) }}" alt="Avatar" class="img-fluid mb-3">
                    <h2>Личная информация</h2>
                    <p class="mt-1">Имя: {{ $user->name }}</p>
                    <p class="mt-1">Email: {{ $user->email }}</p>
                    <p class="mt-1">Телефон: {{ $user->phone }}</p>
                    <button class="btn btn-primary mt-3">Редактировать данные</button>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <h3 class="text-center">Последнее добавленное объявление</h3>
                    @foreach($advertisements->take(1) as $advertisement)
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <a href="{{ route('advertisement.show', $advertisement->id) }}" class="product-link">
                                <div class="card product-card">
                                    <img
                                        src="https://jumanji.livspace-cdn.com/magazine/wp-content/uploads/sites/4/2022/02/01073127/Cover-1.png"
                                        class="card-img-top product-image" alt="Product Image">
                                    <div class="card-body product-details">
                                        <h4 class="card-title">г.{{ $advertisement->address->district->city->name }}, улица {{ $advertisement->address->address }} {{ $advertisement->address->house_number }}</h4>
                                        <ul class="product-info">
                                            <li><img width="12" height="12"
                                                     src="{{ asset('assets/images/square.svg') }}" alt=""><strong>
                                                    Площадь: </strong><span>{{ $advertisement->square }}</span></li>
                                            <li><img width="12" height="12"
                                                     src="{{ asset('assets/images/square.svg') }}" alt=""><strong>
                                                    Количество
                                                    комнат: </strong><span>{{ $advertisement->num_rooms }}</span></li>
                                            <li><img width="12" height="12" src="{{ asset('assets/images/floor.svg') }}"
                                                     alt=""><strong>
                                                    Этаж: </strong><span>{{ $advertisement->floor }}/{{ $advertisement->num_floors }}</span>
                                            </li>
                                            <li><img width="12" height="12" src="{{ asset('assets/images/price.svg') }}"
                                                     alt=""><strong> Стоимость: </strong><span>{{ $advertisement->price }}р.</span>
                                            </li>
                                            <li><img width="14" height="14" style="fill: blue"
                                                     src="{{ asset('assets/images/views.svg') }}" alt=""><strong>
                                                    Просмотрено: </strong><span>{{ $advertisement->views }} </span></li>
                                            <li><img width="14" height="14" style="fill: blue"
                                                     src="{{ asset('assets/images/views.svg') }}" alt=""><strong>
                                                    Статус: </strong>@if ($advertisement->status_id === 1)
                                                    <span class="text-primary">Ожидание</span>
                                                @elseif($advertisement->status_id === 2)
                                                    <span class="text-danger">Отклонено</span>
                                                @else
                                                    <span class="text-success">Одобрено</span>
                                                @endif</li>
                                        </ul>
                                        <form action="{{ route('advertisement.delete', $advertisement->id) }}"
                                              method="post">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" value="Удалить" class="btn btn-danger"
                                                   style="margin-left: 100px;">
                                        </form>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    <div class="text-center">
                            <a href="{{ route('user.advertisements') }}" class="btn btn-primary w-50">Посмотреть все мои объявления</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
