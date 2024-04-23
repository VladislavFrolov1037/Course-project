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
        <div class="col-md-7">
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
                                    <div class="modal fade" id="meetingModal" tabindex="-1"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Запланировать
                                                        встречу</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <form id="form" action="{{ route('meetings.store') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="advertisement_id"
                                                           value="{{ $advertisement->id }}">
                                                    <div class="modal-body">
                                                        <label for="name">Имя</label>
                                                        <input value="{{ old('name') }}" type="text"
                                                               class="form-control" name="name" id="name">
                                                        @error('name')
                                                        <p class="text-danger">{{ $message }}</p>
                                                        @enderror

                                                        <label for="email">Почта</label>
                                                        <input value="{{ old('email') }}" type="email"
                                                               class="form-control" name="email"
                                                               id="email">
                                                        @error('email')
                                                        <p class="text-danger">{{ $message }}</p>
                                                        @enderror

                                                        <label for="phone">Телефон</label>
                                                        <input value="{{ old('phone') }}" type="tel"
                                                               class="form-control" name="phone" id="phone">
                                                        @error('phone')
                                                        <p class="text-danger">{{ $message }}</p>
                                                        @enderror

                                                        <label for="date">Дата</label>
                                                        <input value="{{ old('date') }}" type="date"
                                                               class="form-control" name="date" id="date"
                                                               min="{{ now()->format('Y-m-d') }}">
                                                        @error('date')
                                                        <p class="text-danger">{{ $message }}</p>
                                                        @enderror

                                                        <label for="time">Время</label>
                                                        <input value="{{ old('time') }}" type="time"
                                                               class="form-control" name="time" id="time">
                                                        @error('time')
                                                        <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Закрыть
                                                        </button>
                                                        <button type="submit" class="btn btn-primary">Запланировать
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="successModal" tabindex="-1"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Форма отправлена
                                                        успешно!</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Ваше заявка о встрече будет рассмотрена, после чего вам придет
                                                    сообщение на почту с состоянием встречи.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Закрыть
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @include('components.modals.favouriteButton')
                                    <button type="button" style="margin-left: 4px" class="btn btn-secondary"
                                            data-bs-toggle="modal" data-bs-target="#meetingModal">Запланировать встречу
                                    </button>
                                @endif
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-5">
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
