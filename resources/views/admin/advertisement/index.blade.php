@extends('layouts.admin')
@section('content')
    <div class="admin_filter">
        <form action="{{ asset('admin/advertisements') }}" method="get">
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <label for="type_object">Тип объекта</label>
                    <select class="form-select" name="type_object" id="type_object">
                        <option
                            {{ isset($_GET['type_object']) && $_GET['type_object'] == 'Квартира' ? 'selected' : '' }}
                            value="Квартира">Квартира
                        </option>
                        <option
                            {{ isset($_GET['type_object']) && $_GET['type_object'] == 'Дом' ? 'selected' : '' }}
                            value="Дом">Дом
                        </option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="minSquare">Площадь</label>
                    <input class="form-control" type="number"
                           @if(isset($_GET['square'][0])) value="{{ $_GET['square'][0] }}" @endif  name="square[]"
                           id="minSquare" placeholder="от">
                </div>
                <br>&mdash;
                <div class="col-md-2">
                    <label for="maxSquare"></label>
                    <input class="form-control" type="number"
                           @if(isset($_GET['square'][1])) value="{{ $_GET['square'][1] }}" @endif name="square[]"
                           id="maxSquare" placeholder="до">
                </div>

                <div class="col-md-2">
                    <label for="minRooms">Комнаты</label>
                    <input @if(isset($_GET['num_rooms'][0])) value="{{ $_GET['num_rooms'][0] }}"
                           @endif class="form-control" type="number" name="num_rooms[]" id="minRooms"
                           placeholder="от">
                </div>
                <br>&mdash;
                <div class="col-md-2">
                    <label for="maxRooms"></label>
                    <input @if(isset($_GET['num_rooms'][1])) value="{{ $_GET['num_rooms'][1] }}"
                           @endif class="form-control" type="number" name="num_rooms[]" id="maxRooms"
                           placeholder="до">
                </div>
            </div>
            {{--            <div class="row">--}}
            {{--                <div class="col-md-3">--}}
            {{--                    <label for="city_id">Город</label>--}}
            {{--                    <select class="form-select" name="address_id[]" id="city_id">--}}
            {{--                        <option value="Любой">Любой</option>--}}
            {{--                        @foreach($cities as $city)--}}
            {{--                            <option--}}
            {{--                                value="{{ $city->id }}" @if(isset($_GET['address_id']))--}}
            {{--                                {{ $_GET['address_id'][0] == $city->id ? 'selected' : '' }}--}}
            {{--                                @endif >{{ $city->name }}</option>--}}
            {{--                        @endforeach--}}
            {{--                    </select>--}}
            {{--                </div>--}}
            {{--                <div class="col-md-3">--}}
            {{--                    <label for="district_id">Район</label>--}}
            {{--                    <select class="form-select" name="address_id[]" id="district_id">--}}
            {{--                    </select>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            <div class="row">
                <div class="col-md-3">
                    <label for="repair_type_id">Тип ремонта</label>
                    <select class="form-select" name="repair_type_id" id="repair_type_id">
                        <option value="5">Любой</option>
                        @foreach($repairTypes as $repairType)
                            <option
                                value="{{ $repairType->id }}" {{ request()->input('repair_type_id') == $repairType->id ? 'selected' : '' }}>{{ $repairType->name }}</option>
                        @endforeach
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
                <div class="col-md-2">
                    <label for="user_id">Id продавца</label>
                    <input class="form-control" @if(isset($_GET['user_id'])) value="{{ $_GET['user_id'] }}"
                           @endif type="number" name="user_id" id="user_id" placeholder="1">
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <label for="rental_time">Статус</label>
                    <select class="form-select" name="status_id" id="status_id">
                        @foreach($statuses as $status)
                            <option
                                value="{{ $status->id }}" {{ request()->input('status_id') == $status->id ? 'selected' : '' }}>
                                {{ $status->name }}
                            </option>
                        @endforeach
                    </select>
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
                <div class="col-md-3">
                    <label for="rental_time">Время договора</label>
                    <select class="form-select" name="rental_time" id="rental_time">
                        <option
                            {{ isset($_GET['rental_time']) && $_GET['rental_time'] == 'Долгосрочно' ? 'selected' : '' }}
                            value="Долгосрочно">
                            Долгосрочно
                        </option>
                        <option
                            {{ isset($_GET['rental_time']) && $_GET['rental_time'] == 'Посуточно' ? 'selected' : '' }}
                            value="Посуточно">
                            Посуточно
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
        {{--let citySelect = document.getElementById("city_id");--}}
        {{--let districtSelect = document.getElementById("district_id");--}}
        {{--let districtsByCity = {!! json_encode($districts) !!};--}}

        {{--function updateDistricts(cityId, selectedDistrictId) {--}}
        {{--    districtSelect.innerHTML = "";--}}
        {{--    // Если выбрана опция "Любой" в списке городов, устанавливаем "Любой" в списке районов--}}
        {{--    if (cityId === '') {--}}
        {{--        let option = document.createElement("option");--}}
        {{--        option.value = "Любой";--}}
        {{--        option.textContent = "Любой";--}}
        {{--        option.selected = true;--}}
        {{--        districtSelect.appendChild(option);--}}
        {{--    } else {--}}
        {{--        // Иначе загружаем районы для выбранного города--}}
        {{--        districtsByCity.forEach(function (district) {--}}
        {{--            if (district.city_id == cityId) {--}}
        {{--                let option = document.createElement("option");--}}
        {{--                option.value = district.id;--}}
        {{--                option.textContent = district.name;--}}
        {{--                if (district.id === selectedDistrictId) {--}}
        {{--                    option.selected = true;--}}
        {{--                }--}}
        {{--                districtSelect.appendChild(option);--}}
        {{--            }--}}
        {{--        });--}}
        {{--    }--}}
        {{--}--}}

        {{--// Вызываем функцию обновления при загрузке страницы и при изменении выбранного города--}}
        {{--updateDistricts(citySelect.value, {{ $_GET['address_id'][1] ?? '' }});--}}
        {{--citySelect.addEventListener("change", function () {--}}
        {{--    let cityId = this.value;--}}
        {{--    updateDistricts(cityId, '');--}}
        {{--});--}}


        {{--$(document).ready(function () {--}}
        {{--    $('.btn-approve').click(function () {--}}
        {{--        $.ajax({--}}
        {{--            headers: {--}}
        {{--                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
        {{--            },--}}

        {{--            url: "{{ route('admin.advertisement.changeStatus', $advertisement->id) }}",--}}
        {{--            type: "PATCH",--}}
        {{--            data: data,--}}
        {{--            success: function (response) {--}}
        {{--                $('.justify-content-center').html(response);--}}
        {{--            }--}}
        {{--        })--}}
        {{--    });--}}
        {{--});--}}


        document.addEventListener("DOMContentLoaded", function () {
            document.addEventListener('click', function (event) {
                const target = event.target;

                if (target.classList.contains('btn_delete')) {
                    const confirmed = confirm('Вы уверены, что хотите удалить это объявление?');
                    if (confirmed) {
                        const form = target.closest('form');
                        if (form) {
                            form.submit();
                        }
                    }
                }
            });
        });


    </script>

@endsection
