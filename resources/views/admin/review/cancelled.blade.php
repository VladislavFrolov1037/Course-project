@extends('layouts.admin')
@section('content')
    @include('admin.review.buttons', ['id' => 3])
    <div class="container">
        <div class="sort">
            <label style="font-size: 18px;" for="sort">Сортировать по</label>
            <select class="form-select w-25 mb-5" id="sort">
                <option class="sorting_btn" data-order="default" value="default">По умолчанию</option>
                <option class="sorting_btn" data-order="rating-high-low" value="best_rating">Лучшая оценка</option>
                <option class="sorting_btn" data-order="rating-low-high" value="worst_rating">Худшая оценка</option>
                <option class="sorting_btn" data-order="date-old-new" value="newest_reviews">Новые отзывы</option>
                <option class="sorting_btn" data-order="date-new-old" value="oldest_reviews">Старые отзывы</option>
            </select>
        </div>
        <div class="comments">
            @foreach($reviews as $review)
                <div class="shadow-lg feedback">
                    <div class="feedbacks">
                        <h1>{{ $review->user->name }}
                            @for($i = 1; $i <= $review->rating; $i++)
                                <img src="{{ asset('images/star.png') }}" alt="">
                            @endfor
                        </h1>
                        <h6>Статус: <span class="text-danger">{{ $review->status->name }}</span></h6>
                        <div class="date mt-1">Добавлено: {{ date('d.m.Y', strtotime($review->date)) }}</div>
                        <div class="comment">
                            <p class="comment">{{ $review->comment }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div>
        {{ $reviews->withQueryString()->links() }}
    </div>
@endsection
