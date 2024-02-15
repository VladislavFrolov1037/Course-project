@extends('layouts.main')
@section('content')

    <div class="infoPage">
        <div class="path">
            <p class="link-primary"><a href="{{ route('main') }}">Главная</a> - Каталог - <span>Объявления</span>
            </p>
        </div>
        <div class="info">
            <h1>Объявления</h1>
            <p>Множество квартир на любой вкус</p>
        </div>
    </div>

    <div class="container">
        <div class="filter">
            <form action="{{ asset('products') }}" class="filterForm" method="get">
                @csrf
                <div class="row">
                    <div class="col-md-2">
                        <label for="city">Город</label>
                        <select class="form-select" name="city" id="city">
                            <option value="Магнитогорск">Магнитогорск</option>
                            <option value="Челябинск">Челябинск</option>
                        </select>
                    </div>
                    <div class="col-md-1">
                        <label for="minSquare">Площадь</label>
                        <input class="form-control" type="number"
                               @if(isset($_GET['square'][0])) value="{{ $_GET['square'][0] }}" @endif  name="square[]"
                               id="minSquare" placeholder="от">
                    </div>
                    <br>&mdash;
                    <div class="col-md-1">
                        <label for="maxSquare"></label>
                        <input class="form-control" type="number"
                               @if(isset($_GET['square'][1])) value="{{ $_GET['square'][1] }}" @endif name="square[]"
                               id="maxSquare" placeholder="до">
                    </div>

                    <div class="col-md-1">
                        <label for="minRooms">Комнаты</label>
                        <input @if(isset($_GET['num_rooms'][0])) value="{{ $_GET['num_rooms'][0] }}"
                               @endif class="form-control" type="number" name="num_rooms[]" id="minRooms"
                               placeholder="от">
                    </div>
                    <br>&mdash;
                    <div class="col-md-1">
                        <label for="maxRooms"></label>
                        <input @if(isset($_GET['num_rooms'][1])) value="{{ $_GET['num_rooms'][1] }}"
                               @endif class="form-control" type="number" name="num_rooms[]" id="maxRooms"
                               placeholder="до">
                    </div>

                    <div class="col-md-2">
                        <label for="minPrice">Цена</label>
                        <input class="form-control" @if(isset($_GET['price'][0])) value="{{ $_GET['price'][0] }}"
                               @endif type="number" name="price[]" id="minPrice" placeholder="от">
                    </div>
                    <br>&mdash;
                    <div class="col-md-2">
                        <label for="maxPrice"></label>
                        <input class="form-control" @if(isset($_GET['price'][1])) value="{{ $_GET['price'][1] }}"
                               @endif type="number" name="price[]" id="maxPrice" placeholder="до">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label for="objType">Тип объекта</label>
                        <select class="form-select" name="objType" id="objType">
                            <option value="Магнитогорск">Квартира</option>
                            <option value="Челябинск">Дом</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="floor">Этаж</label>
                        <input class="form-control"
                               @if(isset($_GET['floor']))
                                   value="{{ $_GET['floor'] }}"
                               @endif type="number" name="floor" id="floor"
                               placeholder="3">
                    </div>
                    <div class="col-md-2">
                        <label for="num_floors">Количество этажей</label>
                        <input class="form-control" @if(isset($_GET['num_floors'])) value="{{ $_GET['num_floors'] }}"
                               @endif type="number" name="num_floors" id="num_floors" placeholder="9">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <label for="time_of_agreement">Время договора</label>
                        <select class="form-select" name="time_of_agreement" id="time_of_agreement">
                            <option
                                @if(isset($_GET['time_of_agreement'])) @if($_GET['time_of_agreement'] == 'Любой') selected
                                @endif @endif value="Любой">Любой
                            </option>
                            <option
                                @if(isset($_GET['time_of_agreement'])) @if($_GET['time_of_agreement'] == 'Долгосрочный') selected
                                @endif @endif value="Долгосрочный">Долгосрочный
                            </option>
                            <option
                                @if(isset($_GET['time_of_agreement'])) @if($_GET['time_of_agreement'] == 'Краткосрочный') selected
                                @endif @endif value="Краткосрочный">Краткосрочный
                            </option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="balcony">Балкон</label>
                        <select class="form-select" name="balcony" id="balcony">
                            <option @if(isset($_GET['balcony'])) @if($_GET['balcony'] == 'Любой') selected
                                    @endif @endif value="Любой">Любой
                            </option>
                            <option @if(isset($_GET['balcony'])) @if($_GET['balcony'] == 'true') selected
                                    @endif @endif value="true">Есть
                            </option>
                            <option @if(isset($_GET['balcony'])) @if($_GET['balcony'] == 'false') selected
                                    @endif @endif value="false">Нет
                            </option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1">
                        <button type="reset" id="reset" class="btn btn-danger">Очистить</button>
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">Применить фильтрацию</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            @foreach($advertisements as $advertisement)
{{--                @if($advertisement->is_published === 0)--}}
                    <div class="col-md-4">
                        <a href="{{ route('advertisement.show', $advertisement->id) }}" class="product-link">
                            <div class="card product-card">
                                <img
                                    src="https://jumanji.livspace-cdn.com/magazine/wp-content/uploads/sites/4/2022/02/01073127/Cover-1.png"
                                    class="card-img-top product-image" alt="Product Image">
                                <div class="card-body product-details">
                                    <h4 class="card-title">г.{{ $advertisement->city }},<br> ул. {{ $advertisement->address }}</h4>
                                    <ul class="product-info">
                                        <li><img width="12" height="12" src="{{{ asset('assets/images/square.svg') }}}"
                                                 alt=""><strong> Площадь: </strong> <span>{{ $advertisement->square }}</span>
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
                                        <li><img width="14" height="14" style="fill: blue" src="{{{ asset('assets/images/views.svg') }}}"
                                                 alt=""><strong> Просмотрено: </strong>
                                            <span>{{ $advertisement->views }} </span>
                                        </li>
                                    </ul>
                                    <form action="{{ route('advertisement.delete', $advertisement->id) }}" method="post">
                                        @csrf
                                        <a href="{{ route('advertisement.edit', $advertisement->id) }}">Редактировать</a>
                                        @method('delete')
                                        <input type="submit" value="Удалить" class="btn btn-danger"
                                               style="margin-left: 100px;">
                                    </form>
                                </div>
                            </div>
                        </a>
                    </div>
{{--                @endif--}}
            @endforeach

            <div>
                {{ $advertisements->withQueryString()->links() }}
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/clearFilter.js') }}"></script>
@endsection
