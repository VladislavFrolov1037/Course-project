@extends('layouts.main')
@section('content')
    <div class="infoPage">
        <div class="path">
            <p class="link-primary"><a href="{{ route('main') }}">Главная</a> - О компании -
                <span>Отзывы</span>
            </p>
        </div>
        <div class="info">
            <h1>Отзывы</h1>
            <a href="{{ route('review.create') }}" class="btn btn-primary mt-2">Оставить отзыв</a>
        </div>
    </div>
    <div class="container">
        @foreach($reviews as $review)
            <div class="shadow-lg feedback">
                <div class="feedbacks">
                    <h1>{{ $review->user->name }}
                        @for($i = 1; $i <= $review->rating; $i++)
                            <img src="{{ asset('images/star.png') }}" alt="">
                        @endfor
                    </h1>
                    <div class="date mt-1">Добавлено: {{ date('d.m.Y', strtotime($review->date)) }}</div>
                    <div>
                        <p>{{ $review->comment }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
