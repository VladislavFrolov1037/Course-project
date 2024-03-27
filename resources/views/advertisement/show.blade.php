@extends('layouts.main')
@section('content')

    <div class="infoPage">
        <div class="path">
            <p class="link-primary"><a href="{{ route('main') }}">Главная</a> - Каталог - <a
                    href="{{ route('advertisement.index') }}">Объявления - </a> <span>г.{{ $advertisement->address->district->city->name }}, улица {{ $advertisement->address->address }} {{ $advertisement->address->house_number }}</span></span>
            </p>
        </div>
        <div class="info">
            <h1>
                <span>г.{{ $advertisement->address->district->city->name }}, улица {{ $advertisement->address->address }} {{ $advertisement->address->house_number }}</span>
            </h1>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="row no-gutters">
                        <div class="col-md-6">
                            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach($images as $key => $image)
                                        <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                            <img height="300" width="1200" class="d-block w-100"
                                                 src="{{ asset('/storage/' . $image->url) }}"
                                                 class="slide card-img"
                                                 alt="Product Image">
                                        </div>
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev btn btn-dark btn-sm rounded-0" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next btn btn-dark btn-sm rounded-0" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                    <span class="carousel-control-next-icon"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h3 class="card-title">г. {{ $advertisement->address->district->city->name }}, <br>
                                    {{ $advertisement->address->district->name }} район</h3>
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
                    <div class="col-md-12">
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
                                        <li class="list-group-item"><strong> Тип объекта: </strong>
                                            <span>{{ $advertisement->type_object }}</span>
                                        </li>
                                        <li class="list-group-item"><strong> Площадь: </strong>
                                            <span>{{ $advertisement->square }}</span>
                                        </li>
                                        <li class="list-group-item"><strong> Количество комнат: </strong>
                                            <span>{{ $advertisement->num_rooms }}</span></li>
                                        <li class="list-group-item"><strong> Этаж: </strong>
                                            <span>{{ $advertisement->floor }}/{{ $advertisement->num_floors }}</span>
                                        </li>
                                        <li class="list-group-item"><strong> Тип ремонта: </strong>
                                            <span>{{ $advertisement->repair_type->name }}</span>
                                        </li>
                                        <li class="list-group-item"><strong> Срок аренды: </strong>
                                            <span>{{ $advertisement->rental_time }}</span>
                                        <li class="list-group-item"><strong> Балкон: </strong>
                                            <span>{{ $advertisement->balcony == '1' ? 'Есть' : 'Нет' }}</span>
                                        </li>
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
                                        <li class="list-group-item"><strong> Город: </strong>
                                            <span>{{ $advertisement->address->district->city->name }}</span>
                                        </li>
                                        <li class="list-group-item"><strong> Район: </strong>
                                            <span>{{ $advertisement->address->district->name }}</span>
                                        </li>
                                        <li class="list-group-item"><strong> Улица: </strong>
                                            <span>{{ $advertisement->address->address }} {{ $advertisement->address->house_number }}</span>
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


