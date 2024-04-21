<div class="card">
    <div class="row no-gutters">
        <div class="col-md-6">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach($images as $key => $image)
                        <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                            <img height="300" width="1200" class="d-block w-100"
                                 src="{{ asset('/storage/' . $image->url) }}"
                                 class="slide cardss-img"
                                 alt="Product Image">
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev btn btn-dark btn-sm rounded-0" type="button"
                        data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next btn btn-dark btn-sm rounded-0" type="button"
                        data-bs-target="#carouselExampleControls" data-bs-slide="next">
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
                                                     alt=""><strong>
                            @if ($advertisement->type_object === 'Дом')
                                Количество этажей:
                            @else
                                Этаж:
                            @endif
                        </strong>
                        <span>@if ($advertisement->type_object !== 'Дом')
                                {{ $advertisement->floor }}/
                            @endif{{ $advertisement->num_floors }}</span>
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
                        @if(request()->is('admin/*'))
                            <li class="list-group-item">
                                <strong> Id: </strong>
                                <span>{{ $advertisement->id }}</span></li>
                            <li class="list-group-item">
                                <strong> Статус: </strong>
                                <span>{{ $advertisement->status->name }}</span></li>
                            <li class="list-group-item">
                                <strong> Номер телефона: </strong>
                                <span>{{ $advertisement->user->phone }}</span></li>
                        @endif
                        <li class="list-group-item"><strong> Тип объекта: </strong>
                            <span>{{ $advertisement->type_object }}</span>
                        </li>
                        <li class="list-group-item"><strong> Площадь: </strong>
                            <span>{{ $advertisement->square }}</span>
                        </li>
                        <li class="list-group-item"><strong> Количество комнат: </strong>
                            <span>{{ $advertisement->num_rooms }}</span></li>
                        <li class="list-group-item"><strong>
                                @if ($advertisement->type_object === 'Дом')
                                    Количество этажей:
                                @else
                                    Этаж:
                                @endif</strong>
                            <span>@if ($advertisement->type_object !== 'Дом')
                                    {{ $advertisement->floor }}/
                                @endif
                                {{ $advertisement->num_floors }}</span>
                        </li>
                        <li class="list-group-item"><strong> Тип ремонта: </strong>
                            <span>{{ $advertisement->repair_type }}</span>
                        </li>
                        <li class="list-group-item"><strong> Срок аренды: </strong>
                            <span>{{ $advertisement->rental_time }}</span>
                        @if ($advertisement->type_object !== 'Дом')
                            <li class="list-group-item"><strong> Балкон: </strong>
                                <span>{{ $advertisement->balcony == '1' ? 'Есть' : 'Нет' }}</span>
                            </li>
                        @endif
                        <li class="list-group-item"><strong> Стоимость: </strong>
                            <span>{{ $advertisement->price }}р.</span>
                        </li>
                        <li class="list-group-item mt-3">
                            <div class="d-flex">
                                @if (request()->is('admin/*'))
                                    @if ($advertisement->status_id !== 1)
                                        <form action="{{ route('advertisement.delete', $advertisement->id) }}"
                                              method="post">
                                            @csrf
                                            @method('delete')
                                            <input type="button" value="Удалить" class="btn btn-danger btn_delete"
                                                   style="margin-right: 10px;" name="action" data-action="delete">
                                            <a class="btn btn-primary"
                                               href="{{ route('admin.advertisements.edit', $advertisement->id) }}">
                                                Редактировать
                                            </a>
                                        </form>
                                    @else
                                        <div>
                                            <button name="action" type="button" class="btn btn-danger btn-reject"
                                                    style="margin-right: 10px;" data-action="reject"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#reject{{$advertisement->id}}">
                                                Отклонить
                                            </button>
                                            <button name="action" type="button" class="btn btn-success btn-approve"
                                                    data-action="approve" data-bs-toggle="modal"
                                                    data-bs-target="#approve{{$advertisement->id}}">
                                                Одобрить
                                            </button>
                                        </div>
                                    @endif
                                @elseif ($advertisement->user == auth()->user())
                                    @include('components.modals.deleteModal')
                                    <button name="action" type="button" class="btn btn-danger btn-delete"
                                            data-action="delete" data-bs-toggle="modal"
                                            data-bs-target="#delete{{$advertisement->id}}" style="margin-right: 10px;">
                                        Удалить
                                    </button>
                                @endif
                                @if(!request()->is('admin/*'))
                                    @include('components.modals.favouriteButton')
                                @endif
                            </div>
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
