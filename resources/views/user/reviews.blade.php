@extends('layouts.main')
@section('content')
    <div class="infoPage">
        <div class="path">
            <p class="link-primary"><a href="{{ route('main') }}">Главная</a> - <a href="{{ route('user.index') }}">Личный
                    кабинет</a> -
                <span>Мои отзывы</span>
            </p>
        </div>
        <div class="info">
            <h1>Мои отзывы</h1>
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
                    <div class="comment">
                        <p>{{ $review->comment }}</p>
                    </div>
                    <form action="{{ route('review.delete', $review) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger mt-2">Удалить отзыв</button>
                    </form>
                </div>
            </div>
    </div>
    @endforeach
@endsection
