@extends('layouts.main')
@section('content')
    <div class="infoPage">
        <div class="path">
            <p class="link-primary"><a href="{{ route('main') }}">Главная</a> - Личный кабинет - <span>Создать объявление</span>
            </p>
        </div>
        <div class="info">
            <h1>Новое объявление</h1>
            <p>Создав новое объявление его проверит наш администартор, после чего одобрит его либо отклонит</p>
        </div>
    </div>
    <div class="insertCreateForm">
        <form class="custom-form" action="{{ route('advertisement.update', $advertisement->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Улица</label>
                <input type="text" class="form-control" name="address" value="{{ $advertisement->address }}"
                       id="exampleInputEmail1"
                       aria-describedby="emailHelp"
                       placeholder="Пушкина">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Номер дома</label>
                <input type="text" class="form-control" name="house_number" value="{{ $advertisement->house_number }}"
                       id="exampleInputEmail1"
                       aria-describedby="emailHelp"
                       placeholder="15">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Описание</label>
                <textarea class="form-control" name="description" id="exampleInputPassword1"
                          placeholder="Какая великолепная квартира"
                          style="resize: none; height: 70px;">{{ $advertisement->description }}</textarea>
            </div>
            {{--            <div class="mb-3">--}}
            {{--                <label for="exampleInputPassword1" class="form-label">Фотография</label>--}}
            {{--                <input type="text" class="form-control" name="image" value="{{ $advertisement->image }}"--}}
            {{--                       id="exampleInputPassword1"--}}
            {{--                       placeholder="Формат jpg или png">--}}
            {{--            </div>--}}
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Цена в рублях</label>
                <input type="number" class="form-control" name="price" value="{{ $advertisement->price }}"
                       id="exampleInputPassword1" placeholder="20000">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Площадь квартиры</label>
                <input type="number" class="form-control" name="square" value="{{ $advertisement->square }}"
                       id="exampleInputPassword1" placeholder="92">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Этаж</label>
                <input type="number" class="form-control" name="floor" value="{{ $advertisement->floor }}"
                       id="exampleInputPassword1" placeholder="3">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Кол-во этажей в доме</label>
                <select class="form-select" name="num_floors" aria-label="Default select example">
                    <option value="5" {{ ($advertisement->num_floors == '5') ? 'selected' : '' }}>5</option>
                    <option value="9" {{ ($advertisement->num_floors == '9') ? 'selected' : '' }}>9</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Балкон</label>
                <select class="form-select" name="balcony" aria-label="Default select example">
                    <option value="false" {{ $advertisement->balcony == '0' ? 'selected' : '' }}>Нет</option>
                    <option value="true" {{ $advertisement->balcony == '1' ? 'selected' : '' }}>Есть</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Срок аренды</label>
                <select class="form-select" name="rental_time_id" aria-label="Default select example">
                    @foreach($rentalTimes as $rentalTime)
                        <option
                            value="{{ $rentalTime->id }}" {{$advertisement->rental_time_id === $rentalTime->id ? 'selected' : ''}}>{{ $rentalTime->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Кол-во комнат</label>
                <input type="number" name="num_rooms" value="{{ $advertisement->num_rooms }}" class="form-control"
                       id="exampleInputPassword1" placeholder="5">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Тип ремонта</label>
                <select class="form-select" name="repair_type_id" aria-label="Default select example">
                    @foreach($repairTypes as $repairType)
                        <option
                            value="{{ $repairType->id }}" {{$advertisement->repair_type_id === $repairType->id ? 'selected' : ''}}>{{ $repairType->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Район</label>
                <select class="form-select" name="district_id" aria-label="Default select example">
                    @foreach($districts as $district)
                        <option
                            value="{{ $district->id }}" {{$advertisement->district_id === $district->id ? 'selected' : ''}}>{{ $district->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Тип недвижимости</label>
                <select class="form-select" name="type_object_id" aria-label="Default select example">
                    @foreach($typeObjects as $typeObject)
                        <option
                            value="{{ $typeObject->id }}" {{$advertisement->type_object_id === $typeObject->id ? 'selected' : ''}}>{{ $typeObject->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
