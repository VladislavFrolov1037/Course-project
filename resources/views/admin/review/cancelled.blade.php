@extends('layouts.admin')
@section('content')
    @include('admin.review.buttons', ['id' => 3])
    <div class="container">
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
