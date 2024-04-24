@extends('layouts.main')
@section('content')

    <div class="infoPage">
        <div class="path">
            <p class="link-primary"><a href="{{ route('main') }}">Главная</a> - <span>Избранное</span>
            </p>
        </div>
        <div class="info">
            <h1>Избранное</h1>
            <p>Недвижимость которая вам понравилась</p>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            @foreach($advertisements as $advertisement)
                @include('components.advertisements.advertisements', ['advertisement' => $advertisement, 'routeLink' => 'advertisements.show'])
            @endforeach
        </div>
    </div>
@endsection
