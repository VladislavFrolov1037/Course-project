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
                        <button name="action" type="button" class="btn btn-danger btn-delete mt-3"
                                data-action="delete" data-bs-toggle="modal"
                                data-bs-target="#delete{{$review->id}}"
                                style="margin-right: 10px;">Удалить
                        </button>
                        @include('components.modals.deleteModal', ['id' => $review->id, 'bodyText' => 'Вы действительно хотите удалить отзыв?', 'actionUrl' => route('admin.reviews.destroy', $review->id)])
                </div>
            @endforeach
        </div>
    </div>
    <div>
        {{ $reviews->withQueryString()->links() }}
    </div>
@endsection
