@extends('layouts.main')
@section('content')

    <div class="infoPage">
        <div class="path">
            <p class="link-primary"><a href="{{ route('main') }}">Главная</a> - Каталог - <span>Объявления</span>
            </p>
        </div>
        <div class="info">
            <h1>Объявления</h1>
            <p>Множество недвижимости на любой вкус</p>
        </div>
    </div>

    @include('components.advertisements.filter', ['actionUrl' => asset('advertisements')])

    <div class="container">
        <div class="comments">
            <div class="row justify-content-center advertisements">
                @foreach($advertisements as $advertisement)
                    @include('components.advertisements.advertisements', ['advertisement' => $advertisement, 'routeLink' => 'advertisements.show'])
                @endforeach
            </div>
            <div>
                {{ $advertisements->withQueryString()->links() }}
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/clearFilter.js') }}"></script>
    <script src="{{ asset('assets/js/updateDistricts.js') }}"></script>
@endsection
