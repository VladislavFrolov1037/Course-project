@include('components.modals.deleteModal', ['id' => $advertisement->id, 'bodyText' => 'Вы действительно хотите удалить объявление?', 'actionUrl' => route('advertisements.delete', $advertisement->id) ])
<div class="col-md-{{ $columnWidth ?? '4' }}">
    <div class="card @if(!request()->is('admin/*')) product-card @else product-card-admin @endif">
        <a href="{{ route($routeLink, $advertisement->id) }}" class="product-link">
            <img
                src="{{ asset('storage/' . $advertisement->images->first()->url) }}"
                class="card-img-top product-image" alt="Product Image">
            <div class="card-body product-details">
                <h4 class="card-title">г.{{ $advertisement->address->district->city->name }},<br>
                    ул. {{ $advertisement->address->address }} {{ $advertisement->address->house_number }}
                </h4>
                <ul class="product-info">
                    @if(request()->is('admin/*') || request()->is('user/*') || request()->is('user'))
                        <li><img width="14" height="14" style="fill: blue"
                                 src="{{ asset('assets/images/views.svg') }}" alt=""><strong>
                                Статус: </strong>@if ($advertisement->status_id === 1)
                                <span class="text-primary">Ожидание</span>
                            @elseif($advertisement->status_id === 2)
                                <span class="text-success">Одобрено</span>
                            @else
                                <span class="text-danger">Отклонено</span>
                            @endif</li>
                        </li>
                    @endif
                    <li><img width="12" height="12" src="{{{ asset('assets/images/square.svg') }}}"
                             alt=""><strong> Площадь: </strong>
                        <span>{{ $advertisement->square }}</span>
                    </li>
                    <li><img width="12" height="12" src="{{{ asset('assets/images/square.svg') }}}"
                             alt=""><strong> Количество комнат: </strong>
                        <span>{{ $advertisement->num_rooms }}</span></li>

                    <li><img width="12" height="12" src="{{{ asset('assets/images/floor.svg') }}}"
                             alt=""><strong>
                            @if ($advertisement->type_object === 'Дом')
                                Количество этажей:
                            @else
                                Этаж:
                            @endif
                        </strong>
                        <span>@if ($advertisement->type_object !== 'Дом')
                                {{ $advertisement->floor }}/
                            @endif{{ $advertisement->num_floors }}</span></li>
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
            </div>
        </a>

        <div class="mt-3" style="padding-left: 10px;">
            @if(request()->is('admin/*'))
                @if($advertisement->status_id !== 1)
                    <form action="{{ route('advertisements.delete', $advertisement->id) }}"
                          method="post">
                        @csrf
                        @method('delete')
                        <input type="button" value="Удалить" class="btn btn-danger btn_delete"
                               style="margin-right: 10px;" name="action"
                               data-action="delete">
                        <a class="btn btn-primary"
                           href="{{ route('admin.advertisements.edit', $advertisement->id) }}">Редактировать</a>
                    </form>
                @else
                    @include('components.modals.rejectModal', ['id' => $advertisement->id, 'message' => 'Вы действительно хотите отклонить предложение?', 'actionUrl' => route('admin.advertisements.changeStatus', $advertisement->id)])
                    @include('components.modals.approveModal', ['id' => $advertisement->id, 'message' => 'Вы действительно хотите одобрить предложение?', 'actionUrl' => route('admin.advertisements.changeStatus', $advertisement->id)])
                    <div>
                        <button name="action" type="button" class="btn btn-danger btn-reject"
                                style="margin-right: 10px;" data-action="reject"
                                data-bs-toggle="modal" data-bs-target="#reject{{$advertisement->id}}">Отклонить
                        </button>
                        <button name="action" type="button" class="btn btn-success btn-approve"
                                data-action="approve" data-bs-toggle="modal"
                                data-bs-target="#approve{{$advertisement->id}}">Одобрить
                        </button>
                    </div>
                @endif
            @else
                <div class="d-flex">
                    @if ($advertisement->user && auth()->user() && $advertisement->user->id === auth()->user()->id)
                        <button name="action" type="button" class="btn btn-danger btn-delete"
                                data-action="delete" data-bs-toggle="modal"
                                data-bs-target="#delete{{$advertisement->id}}"
                                style="margin-right: 10px;">Удалить
                        </button>
                    @endif
                    @include('components.modals.favouriteButton')
                </div>
            @endif
        </div>
    </div>
</div>
