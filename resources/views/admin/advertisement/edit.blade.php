@extends('layouts.admin')
@section('content')
    <div class="infoPage">
        <div class="info">
            <h1>Обновить объявление</h1>
            <p>Редактирование объявления</p>
        </div>
    </div>
    <div class="insertCreateForm">
        <form class="custom-form" action="{{ route('admin.advertisements.update', $advertisement) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="status_id">Статус</label>
                <select class="form-select" name="status_id" id="status_id">
                    @foreach($statuses as $status)
                        <option
                            value="{{ $status->id }}" {{ old('status_id', $advertisement->status->id) == $status->id ? 'selected' : '' }}>
                            {{ $status->name }}
                        </option>
                    @endforeach
                </select>
                @error('status_id')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Город</label>
                <select class="form-select" name="city_id" id="city_id">
                    @foreach($cities as $city)
                        <option
                            value="{{ $city->id }}" {{ old('city_id', $advertisement->address->district->city->id) == $city->id ? 'selected' : '' }}>
                            {{ $city->name }}
                        </option>
                    @endforeach
                </select>
                @error('city_id')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Район</label>
                <select class="form-select" name="district_id" id="district_id">
                </select>
                @error('district_id')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Улица</label>
                <input type="text" class="form-control" name="address" id="exampleInputEmail1"
                       value="{{ old('address', $advertisement->address->address) }}"
                       placeholder="улица">
                @error('address')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Номер дома</label>
                <input type="text" class="form-control" name="house_number" id="exampleInputEmail1"
                       value="{{ old('house_number', $advertisement->address->house_number) }}"
                       placeholder="номер дома">
                @error('house_number')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Описание</label>
                <textarea class="form-control" name="description" id="exampleInputPassword1"
                          placeholder="Какая великолепная квартира"
                          style="resize: none; height: 70px;">{{ old('description', $advertisement->description) }}</textarea>
                @error('description')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Цена в рублях</label>
                <input type="number" class="form-control" value="{{ old('price', $advertisement->price) }}" name="price"
                       id="exampleInputPassword1" placeholder="20000">
                @error('price')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Тип объекта</label>
                <select class="form-select" name="type_object" id="type_object">
                    @foreach($typeObjects as $typeObject)
                        <option
                            value="{{ $typeObject }}" {{ old('type_object', $advertisement->type_object) == $typeObject ? 'selected' : '' }}>
                            {{ $typeObject }}
                        </option>
                    @endforeach
                </select>
                @error('type_object')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Площадь объекта</label>
                <input type="number" class="form-control" name="square" value="{{ old('square', $advertisement->square) }}"
                       id="exampleInputPassword1" placeholder="100">
                @error('square')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Этаж</label>
                <input type="number" class="form-control" name="floor" value="{{ old('floor', $advertisement->floor) }}"
                       id="floor" placeholder="номер этажа">
                @error('floor')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Кол-во этажей в доме</label>
                <input class="form-control" type="number" name="num_floors" value="{{ old('num_floors', $advertisement->num_floors) }}"
                       placeholder="количество этажей">
                @error('num_floors')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Балкон</label>
                <select class="form-select" name="balcony" id="balcony" aria-label="Default select example">
                    <option {{ old('balcony', $advertisement->balcony) == '0' ? 'selected' : '' }} value="0">Нет</option>
                    <option {{ old('balcony', $advertisement->balcony) == '1' ? 'selected' : '' }} value="1">Есть</option>
                </select>
                @error('balcony')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Срок аренды</label>
                <select class="form-select" name="rental_time">
                    @foreach($rentalTimes as $rentalTime)
                        <option
                            value="{{ $rentalTime }}" {{ old('rental_time', $advertisement->rental_time) == $rentalTime ? 'selected' : '' }}>
                            {{ $rentalTime }}
                        </option>
                    @endforeach
                </select>
                @error('rental_time')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Кол-во комнат</label>
                <input type="number" name="num_rooms" value="{{ old('num_rooms', $advertisement->num_rooms) }}" class="form-control"
                       id="exampleInputPassword1" placeholder="1">
                @error('num_rooms')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Тип ремонта</label>
                <select class="form-select" name="repair_type" id="">
                    @foreach($repairTypes as $repairType)
                        <option
                            value="{{ $repairType }}" {{ old('repair_type', $advertisement->repair_type) == $repairType ? 'selected' : '' }}>
                            {{ $repairType }}
                        </option>
                    @endforeach
                </select>
                @error('repair_type')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Фотографии</label>
                <input type="file" multiple class="form-control" name="images[]"
                       id="exampleInputPassword1"
                       placeholder="Формат jpg или png">
                @error('images')
                <p class="text-danger">{{ $message }}</p>
                @else
                    @error('images.*')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    @enderror
            </div>
            <button type="submit" class="btn btn-primary">Обновить</button>
        </form>
    </div>

    <script>
        window.currentDistrictId = {{ $advertisement->address->district->id }};
        window.districtsByCity = {!! json_encode($districts) !!};
        window.selectedDistrictId = localStorage.getItem('selectedDistrictId');
    </script>

    <script src="{{ asset('assets/js/createUpdateDistricts.js') }}"></script>
@endsection
