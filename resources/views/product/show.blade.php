@extends('layouts.main')
@section('content')

    <div class="infoPage">
        <div class="path">
            <p class="link-primary"><a href="{{ route('main') }}">Главная</a> - Каталог - <a
                    href="{{ route('product.index') }}">Объявления - </a> <span>{{ $product->num_rooms }}-комнатная квартира на {{ $product->address }}</span>
            </p>
        </div>
        <div class="info">
            <h1><span>{{ $product->num_rooms }}-комнатная квартира на {{ $product->address }}</span></h1>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="row no-gutters">
                        <div class="col-md-6">
                            <img height="300" width="1200" src="{{ $product->image }}" class="card-img"
                                 alt="Product Image">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h3 class="card-title">{{ $product->address }}</h3>
                                <ul class="product-info">
                                    <li class="list-group-item"><img width="12" height="12"
                                                                     src="{{{ asset('assets/images/square.svg') }}}"
                                                                     alt=""><strong> Город: </strong>
                                        <span>{{ $product->city }}</span></li>
                                    <li class="list-group-item"><img width="12" height="12"
                                                                     src="{{{ asset('assets/images/square.svg') }}}"
                                                                     alt=""><strong> Площадь: </strong>
                                        <span>{{ $product->square }}</span></li>
                                    <li class="list-group-item"><img width="12" height="12"
                                                                     src="{{{ asset('assets/images/square.svg') }}}"
                                                                     alt=""><strong> Количество комнат: </strong>
                                        <span>{{ $product->num_rooms }}</span></li>
                                    <li class="list-group-item"><img width="12" height="12"
                                                                     src="{{{ asset('assets/images/floor.svg') }}}"
                                                                     alt=""><strong> Этаж: </strong> <span>{{ $product->floor }}/{{ $product->num_floors }}</span>
                                    </li>
                                    <li class="list-group-item"><img width="12" height="12"
                                                                     src="{{{ asset('assets/images/square.svg') }}}"
                                                                     alt=""><strong> Номер продавца: </strong>
                                        <span>{{ $product->phone }}</span>
                                    </li>
                                    <li class="list-group-item"><img width="12" height="12"
                                                                     src="{{{ asset('assets/images/price.svg') }}}"
                                                                     alt=""><strong> Стоимость: </strong> <span>{{ $product->price }}р.</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-object">
                            <div class="description">
                                <h3>Описание</h3>
                                <p>{{ $product->description }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row no-gutters mt-2">
                        <div class="col-md-6">
                            <div class="info-object">
                                <div class="description">
                                    <h3>Параметры</h3>
                                    <ul class="product-info">
                                        <li class="list-group-item"><strong> Город: </strong>
                                            <span>{{ $product->city }}</span>
                                        </li>
                                        <li class="list-group-item"><strong> Адрес: </strong>
                                            <span>{{ $product->address }}</span>
                                        </li>
                                        <li class="list-group-item"><strong> Площадь: </strong>
                                            <span>{{ $product->square }}</span>
                                        </li>
                                        <li class="list-group-item"><strong> Количество комнат: </strong>
                                            <span>{{ $product->num_rooms }}</span></li>
                                        <li class="list-group-item"><strong> Этаж: </strong>
                                            <span>{{ $product->floor }}/{{ $product->num_floors }}</span></li>
                                        <li class="list-group-item"><strong> Срок аренды: </strong>
                                            <span>{{ $product->time_of_agreement }}</span>
                                        <li class="list-group-item"><strong> Балкон: </strong>
                                            <span>{{ $product->balcony == '1' ? 'Есть' : 'Нет' }}</span>
                                        <li class="list-group-item"><strong> Номер телефона: </strong>
                                            <span>{{ $product->phone }}</span>
                                        <li class="list-group-item"><strong> Стоимость: </strong>
                                            <span>{{ $product->price }}р.</span>
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
                                        <li class="list-group-item"><strong> Населенный пункт: </strong>
                                            <span>{{ $product->city }}</span>
                                        </li>
                                        <li class="list-group-item"><strong> Адрес: </strong>
                                            <span>{{ $product->address }}</span>
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
