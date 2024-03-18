@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @foreach($advertisements as $advertisement)
                <div class="col-md-4 mt-5">
                    <a href="{{ route('advertisement.show', $advertisement->id) }}" class="product-link">
                        <div class="card product-card">
                            <img
                                src="https://jumanji.livspace-cdn.com/magazine/wp-content/uploads/sites/4/2022/02/01073127/Cover-1.png"
                                class="card-img-top product-image" alt="Product Image">
                            <div class="card-body product-details">
                                <h4 class="card-title">г. {{ $advertisement->address->district->city->name }}, <br>
                                    {{ $advertisement->address->district->name }} район</h4>
                                <ul class="product-info">
                                    <li><img width="12" height="12" src="{{{ asset('assets/images/square.svg') }}}"
                                             alt=""><strong> Статус: </strong>
                                        <span>{{ $advertisement->status->name }}</span>
                                    </li>
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
                    </a>

                    @if($advertisement->status_id !== 1)
                        <form action="{{ route('advertisement.delete', $advertisement->id) }}"
                              method="post">
                            @csrf
                            <div class="btn-group"
                                 style="display: flex; justify-content: space-between; align-items: center;">
                                <div>
                                    @method('delete')
                                    <input type="button" value="Удалить" class="btn btn-danger btn_delete" name="action"
                                           data-action="delete">
                                    <a class="btn btn-primary"
                                       href="{{ route('advertisement.edit', $advertisement->id) }}">Редактировать</a>
                                </div>
                            </div>
                        </form>
                    @else
                        <div>
                            <button name="action" type="button" class="btn btn-danger btn-reject" data-action="reject"
                                    data-bs-toggle="modal" data-bs-target="#reject{{$advertisement->id}}">Отклонить
                            </button>
                            <button name="action" type="button" class="btn btn-success btn-approve"
                                    data-action="approve" data-bs-toggle="modal" data-bs-target="#approve{{$advertisement->id}}">Одобрить
                            </button>
                        </div>
                    @endif

                    <!-- Reject Modal -->
                    <div class="modal fade" id="reject{{ $advertisement->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Подтвердите действие</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Вы действительно хотите отклонить объявление?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                    <form class="statusForm"
                                          action="{{ route('admin.advertisement.changeStatus', $advertisement->id) }}"
                                          method="post" id="statusForm">
                                        @csrf
                                        @method('patch')
                                        <div class="btn-group"
                                             style="display: flex; justify-content: space-between; align-items: center;">
                                            <div>
                                                <button name="action" value="reject" type="submit" class="btn btn-danger btn-reject">
                                                    Отклонить
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Approve Modal -->
                    <div class="modal fade" id="approve{{ $advertisement->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Подтвердите действие</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Вы действительно хотите одобрить объявление?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                    <form class="statusForm"
                                          action="{{ route('admin.advertisement.changeStatus', $advertisement->id) }}"
                                          method="post" id="statusForm">
                                        @csrf
                                        @method('patch')
                                        <div class="btn-group"
                                             style="display: flex; justify-content: space-between; align-items: center;">
                                            <div>
                                                <button name="action" value="approve" type="submit" class="btn btn-success btn-approve">
                                                    Одобрить
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
        </div>
    </div>
    {{--                @endif--}}
    @endforeach

    <div>
        {{ $advertisements->withQueryString()->links() }}
    </div>

    <script src="{{ asset('assets/js/clearFilter.js') }}"></script>
    <script>

    </script>

@endsection
