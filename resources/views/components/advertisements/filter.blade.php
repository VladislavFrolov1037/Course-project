<div class="container">
    <div class="filter">
        <form action="{{ $actionUrl }}" class="filterForm" method="get">
            @csrf
            <div class="row">
                <div class="col-md-2">
                    <label for="type_object">Тип объекта</label>
                    <select class="form-select" name="type_object" id="type_object">
                        @if(request()->is('admin/*'))
                            <option
                                {{ isset($_GET['type_object']) && $_GET['type_object'] == 'any' ? 'selected' : '' }}
                                value="any">Любой
                            </option>
                        @endif
                        @foreach($typeObjects as $typeObject)
                            <option
                                value="{{ $typeObject }}" {{ request()->input('type_object') == $typeObject ? 'selected' : '' }}>{{ $typeObject }}</option>
                        @endforeach
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
                    <label for="city_id">Город</label>
                    <select class="form-select" name="address_id[]" id="city_id"
                            data-districts='{{ json_encode($districts) }}'
                            data-selected-district-id='{{ $_GET['address_id'][1] ?? '' }}'>
                        @if(request()->is('admin/*'))
                            <option
                                value="any" @if(isset($_GET['address_id']))
                                {{ $_GET['address_id'][0] == 'any' ? 'selected' : '' }}
                                @endif>Любой
                            </option>
                        @endif
                        @foreach($cities as $city)
                            <option
                                value="{{ $city->id }}" @if(isset($_GET['address_id']))
                                {{ $_GET['address_id'][0] == $city->id ? 'selected' : '' }}
                                @endif >{{ $city->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="district_id">Район</label>
                    <select class="form-select" name="address_id[]" id="district_id">
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
                    <label for="repair_type">Тип ремонта</label>
                    <select class="form-select" name="repair_type" id="repair_type">
                        <option value="any">Любой</option>
                        @foreach($repairTypes as $repairType)
                            <option
                                value="{{ $repairType }}" {{ request()->input('repair_type') == $repairType ? 'selected' : '' }}>{{ $repairType }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="rental_time">Время договора</label>
                    <select class="form-select" name="rental_time" id="rental_time">
                        @if(request()->is('admin/*'))
                            <option
                                {{ isset($_GET['rental_time']) && $_GET['rental_time'] == 'any' ? 'selected' : '' }}
                                value="any">
                                Любой
                            </option>
                        @endif
                        @foreach($rentalTimes as $rentalTime)
                            <option
                                value="{{ $rentalTime }}" {{ request()->input('rental_time') == $rentalTime ? 'selected' : '' }}>{{ $rentalTime }}</option>
                        @endforeach
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
            @if(request()->is('admin/*'))
                <div class="row">
                    <div class="col-md-2">
                        <label for="rental_time">Статус</label>
                        <select class="form-select" name="status_id" id="status_id">
                            @foreach($statuses as $status)
                                @if($status->id != 4)
                                    <option
                                        value="{{ $status->id }}" {{ request()->input('status_id') == $status->id ? 'selected' : '' }}>
                                        {{ $status->name }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="user_id">Id продавца</label>
                        <input class="form-control" @if(isset($_GET['user_id'])) value="{{ $_GET['user_id'] }}"
                               @endif type="number" name="user_id" id="user_id" placeholder="1">
                    </div>
                </div>
            @endif
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

<script>
    const typeObject = document.getElementById('type_object');
    let floor = document.getElementById('floor');
    let balcony = document.getElementById('balcony');

    typeObject.addEventListener('change', () => {
        changeTypeObject(typeObject.value);
    });

    function changeTypeObject(typeObject) {
        if (typeObject === 'Дом') {
            floor.disabled = true;
            balcony.disabled = true;
        } else {
            floor.disabled = false;
            balcony.disabled = false;
        }
    }

    changeTypeObject(typeObject.value)
</script>
