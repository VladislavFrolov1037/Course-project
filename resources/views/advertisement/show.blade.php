@extends('layouts.main')
@section('content')

    <div class="infoPage">
        <div class="path">
            <p class="link-primary"><a href="{{ route('main') }}">Главная</a> - Каталог - <a
                    href="{{ route('advertisement.index') }}">Объявления - </a> <span>г.{{ $advertisement->address->district->city->name }}, улица {{ $advertisement->address->address }} {{ $advertisement->address->house_number }}</span></span>
            </p>
        </div>
        <div class="info">
            <h1>
                <span>г.{{ $advertisement->address->district->city->name }}, улица {{ $advertisement->address->address }} {{ $advertisement->address->house_number }}</span>
            </h1>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                @include('components.advertisements.advertisement', ['advertisement' => $advertisement, 'images' => $images])
            </div>
        </div>
    </div>

@endsection


