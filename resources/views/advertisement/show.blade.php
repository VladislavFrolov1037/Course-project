@extends('layouts.main')
@section('content')

    <div class="infoPage">
        <div class="path">
            <p class="link-primary"><a href="{{ route('main') }}">Главная</a> - Каталог - <a
                    href="{{ route('advertisement.index') }}">Объявления - </a> <span>{{ $advertisement->num_rooms }}-комнатная квартира на {{ $advertisement->address }}</span>
            </p>
        </div>
        <div class="info">
            <h1><span>{{ $advertisement->num_rooms }}-комнатная квартира на {{ $advertisement->address }}</span></h1>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="row no-gutters">
                        <div class="col-md-6">
                            <img height="300" width="1200" src="{{ $advertisement->image }}" class="card-img"
                                 alt="Product Image">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h3 class="card-title">{{ $advertisement->address }}</h3>
                                <ul class="product-info">
                                    <li class="list-group-item"><img width="12" height="12"
                                                                     src="{{{ asset('assets/images/square.svg') }}}"
                                                                     alt=""><strong> Площадь: </strong>
                                        <span>{{ $advertisement->square }}</span></li>
                                    <li class="list-group-item"><img width="12" height="12"
                                                                     src="{{{ asset('assets/images/square.svg') }}}"
                                                                     alt=""><strong> Количество комнат: </strong>
                                        <span>{{ $advertisement->num_rooms }}</span></li>
                                    <li class="list-group-item"><img width="12" height="12"
                                                                     src="{{{ asset('assets/images/floor.svg') }}}"
                                                                     alt=""><strong> Этаж: </strong> <span>{{ $advertisement->floor }}/{{ $advertisement->num_floors }}</span>
                                    </li>
                                    <li class="list-group-item"><img width="12" height="12"
                                                                     src="{{{ asset('assets/images/price.svg') }}}"
                                                                     alt=""><strong> Стоимость: </strong> <span>{{ $advertisement->price }}р.</span>
                                    </li>
                                    <li><img width="14" height="14" style="fill: blue"
                                             src="{{{ asset('assets/images/views.svg') }}}"
                                             alt=""><strong> Просмотрено: </strong>
                                        <span>{{ $advertisement->views }} </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-object">
                            <div class="description">
                                <h3>Описание</h3>
                                <p>{{ $advertisement->description }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row no-gutters mt-2">
                        <div class="col-md-6">
                            <div class="info-object">
                                <div class="description">
                                    <h3>Параметры</h3>
                                    <ul class="product-info">
                                        <li class="list-group-item"><strong> Адрес: </strong>
                                            <span>{{ $advertisement->address }}</span>
                                        </li>
                                        <li class="list-group-item"><strong> Площадь: </strong>
                                            <span>{{ $advertisement->square }}</span>
                                        </li>
                                        <li class="list-group-item"><strong> Количество комнат: </strong>
                                            <span>{{ $advertisement->num_rooms }}</span></li>
                                        <li class="list-group-item"><strong> Этаж: </strong>
                                            <span>{{ $advertisement->floor }}/{{ $advertisement->num_floors }}</span>
                                        </li>
                                        <li class="list-group-item"><strong> Срок аренды: </strong>
                                            <span>{{ $advertisement->time_of_agreement }}</span>
                                        <li class="list-group-item"><strong> Балкон: </strong>
                                            <span>{{ $advertisement->balcony == '1' ? 'Есть' : 'Нет' }}</span>
                                        <li class="list-group-item"><strong> Стоимость: </strong>
                                            <span>{{ $advertisement->price }}р.</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-object">
                                <div class="description">
                                    <h3>Местоположение</h3>
                                    <ul class="product-info">
                                        <li class="list-group-item"><strong> Область: </strong>
                                            <span>Челябинская область</span>
                                        </li>
                                        <li class="list-group-item"><strong> Адрес: </strong>
                                            <span>{{ $advertisement->address }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
