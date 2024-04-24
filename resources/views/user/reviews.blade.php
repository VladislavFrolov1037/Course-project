@extends('layouts.main')
@section('content')
    <div class="infoPage">
        <div class="path">
            <p class="link-primary"><a href="{{ route('main') }}">Главная</a> - <a href="{{ route('users.index') }}">Личный
                    кабинет</a> -
                <span>Мои отзывы</span>
            </p>
        </div>
        <div class="info">
            <h1>Мои отзывы</h1>
            @if(!count($reviews))
                <h3>Вы не оставляли отзывы о нашей компании, хотите оставить <a
                        href="{{ route('reviews.create') }}">отзыв?</a></h3>
            @endif
        </div>
    </div>
    <div class="container">
        @foreach($reviews as $review)
            @include('components.reviews')
        @endforeach
    </div>
@endsection
