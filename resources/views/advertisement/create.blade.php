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
        <form class="custom-form" action="{{ route('advertisement.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Город</label>
                <select class="form-select" name="city_id" id="city_id">
                    @foreach($cities as $city)
                        <option
                            value="{{ $city->id }}" {{ old('city_id') === $city->id ? 'selected' : '' }}>
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
                       value="{{ old('address') }}"
                       placeholder="Пушкина 15/2">
                @error('address')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Номер дома</label>
                <input type="text" class="form-control" name="house_number" id="exampleInputEmail1"
                       value="{{ old('house_number') }}"
                       placeholder="Пушкина 15/2">
                @error('house_number')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Описание</label>
                <textarea class="form-control" name="description" id="exampleInputPassword1"
                          placeholder="Какая великолепная квартира"
                          style="resize: none; height: 70px;">{{ old('description') }}</textarea>
                @error('description')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Цена в рублях</label>
                <input type="number" class="form-control" value="{{ old('price') }}" name="price"
                       id="exampleInputPassword1" placeholder="20000">
                @error('price')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Площадь объекта</label>
                <input type="number" class="form-control" name="square" value="{{ old('square') }}"
                       id="exampleInputPassword1" placeholder="92">
                @error('square')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Этаж</label>
                <input type="number" class="form-control" name="floor" value="{{ old('floor') }}"
                       id="exampleInputPassword1" placeholder="3">
                @error('floor')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Кол-во этажей в доме</label>
                <input class="form-control" type="number" name="num_floors" value="{{ old('num_floors') }}" placeholder="3">
                @error('num_floors')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Балкон</label>
                <select class="form-select" name="balcony" aria-label="Default select example">
                    <option selected value="false">Нет</option>
                    <option value="true">Есть</option>
                </select>
                @error('balcony')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Срок аренды</label>
                <select class="form-select" name="rental_time" aria-label="Default select example">
                    <option value="Посуточно">Посуточно</option>
                    <option value="Долгосрочно">Долгосрочно</option>
                </select>
                @error('rental_time')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Кол-во комнат</label>
                <input type="number" name="num_rooms" value="{{ old('num_rooms') }}" class="form-control"
                       id="exampleInputPassword1" placeholder="5">
                @error('num_rooms')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Тип ремонта</label>
                <select class="form-select" name="repair_type_id" id="">
                    @foreach($repairTypes as $repairType)
                        <option
                            value="{{ $repairType->id }}" {{ old('repair_type_id') === $repairType->id ? 'selected' : '' }}>
                            {{ $repairType->name }}
                        </option>
                    @endforeach
                </select>
                @error('repair_type_id')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Тип объекта</label>
                <select class="form-select" name="type_object" id="">
                    <option value="Квартира">Квартира</option>
                    <option value="Дом">Дом</option>
                </select>
                @error('type_object')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Фотография</label>
                <input type="file" multiple class="form-control" value="{{ old('image') }}" name="images[]"
                       id="exampleInputPassword1"
                       placeholder="Формат jpg или png">
                @error('image')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Отправить на рассмотрение</button>
        </form>
    </div>

    <script>
        let citySelect = document.getElementById("city_id");
        let districtSelect = document.getElementById("district_id");
        let districtsByCity = {!! json_encode($districts) !!};

        function updateDistricts(cityId, selectedDistrictId) {
            districtSelect.innerHTML = '';

            districtsByCity.forEach(function (district) {
                if (district.city_id == cityId) {
                    let option = document.createElement("option");
                    option.value = district.id;
                    option.textContent = district.name;
                    if (district.id === selectedDistrictId) {
                        option.selected = true;
                    }
                    districtSelect.appendChild(option);
                }
            });
        }

        // Вызываем функцию обновления при загрузке страницы и при изменении выбранного города
        updateDistricts(citySelect.value, {{ $_GET['address_id'][1] ?? '' }});
        citySelect.addEventListener("change", function () {
            let cityId = this.value;
            updateDistricts(cityId, '');
        });


    </script>
@endsection
