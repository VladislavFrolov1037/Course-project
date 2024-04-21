@extends('layouts.main')
@section('content')
    <div class="infoPage">
        <div class="path">
            <p class="link-primary"><a href="{{ route('main') }}">Главная</a> - О компании -
                <span>Отзыв</span>
            </p>
        </div>
        <div class="info">
            <h1>Здесь вы можете оставить отзыв о работе компании</h1>
        </div>
    </div>
    <div class="insertCreateForm">
        <form class="custom-form1" action="{{ route('review.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="comment" class="form-label">Комментарий</label>
                <textarea type="text" class="form-control" name="comment" id="comment"
                          placeholder="Ваш комментарий"></textarea>
                @error('comment')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="rating" class="form-label">Рейтинг</label>
                <select class="form-select" name="rating" id="rating">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                @error('rating')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary sendForm">Отправить на рассмотрение</button>
        </form>
    </div>

    <script src="{{ asset('assets/js/sendForm.js') }}"></script>
@endsection
