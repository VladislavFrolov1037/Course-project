@extends('layouts.main')
@section('content')

    <div class="infoPage">
        <div class="path">
            <p class="link-primary"><a href="{{ route('main') }}">Главная</a> - <span>Избранное</span>
            </p>
        </div>
        <div class="info">
            <h1>Избранное</h1>
            <p>Недвижимость которая вам понравилась</p>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            @foreach($advertisements as $advertisement)
                <div class="col-md-4">
                    <a href="{{ route('advertisement.show', $advertisement->id) }}" class="product-link">
                        <div class="card product-card">
                            <img
                                src="https://jumanji.livspace-cdn.com/magazine/wp-content/uploads/sites/4/2022/02/01073127/Cover-1.png"
                                class="card-img-top product-image" alt="Product Image">
                            <div class="card-body product-details">
                                <h4 class="card-title">г.{{ $advertisement->city }},<br>
                                    ул. {{ $advertisement->address }}</h4>
                                <ul class="product-info">
                                    <li><img width="12" height="12" src="{{{ asset('assets/images/square.svg') }}}"
                                             alt=""><strong> Площадь: </strong>
                                        <span>{{ $advertisement->square }}</span>
                                    </li>
                                    <li><img width="12" height="12" src="{{{ asset('assets/images/square.svg') }}}"
                                             alt=""><strong> Количество комнат: </strong>
                                        <span>{{ $advertisement->num_rooms }}</span></li>
                                    <li><img width="12" height="12" src="{{{ asset('assets/images/floor.svg') }}}"
                                             alt=""><strong> Этаж: </strong>
                                        <span>{{ $advertisement->floor }}/{{ $advertisement->num_floors }}</span></li>
                                    <li><img width="12" height="12" src="{{{ asset('assets/images/price.svg') }}}"
                                             alt=""><strong> Стоимость: </strong>
                                        <span>{{ $advertisement->price }}р.</span>
                                    </li>
                                    <li><img width="14" height="14" style="fill: blue"
                                             src="{{{ asset('assets/images/views.svg') }}}"
                                             alt=""><strong> Просмотрено: </strong>
                                        <span>{{ $advertisement->views }} </span>
                                    </li>
                                </ul>
{{--                                <form action="{{ route('advertisement.delete', $advertisement->id) }}" method="post">--}}
{{--                                    @csrf--}}
{{--                                    <a href="{{ route('advertisement.edit', $advertisement->id) }}">Редактировать</a>--}}
{{--                                    @method('delete')--}}
{{--                                    <input type="submit" value="Удалить" class="btn btn-danger"--}}
{{--                                           style="margin-left: 100px;">--}}
{{--                                </form>--}}
                                @auth
                                    <form action="{{ route('favourite.delete', $advertisement->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger removeFavourite">Удалить из избранного</button>
                                    </form>
                                @endauth
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <script src="{{ asset('assets/js/clearFilter.js') }}"></script>
@endsection
