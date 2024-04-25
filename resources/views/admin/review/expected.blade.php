@extends('layouts.admin')
@section('content')
    @include('admin.review.buttons', ['id' => 2])


    <div class="container">
        <div class="comments">
            @foreach($reviews as $review)
                @include('components.modals.rejectModal', [
                    'id' => $review->id,
                    'message' => 'Вы действительно хотите отклонить отзыв?',
                    'actionUrl' => route('admin.reviews.changeStatus', $review->id)
                ])
                @include('components.modals.approveModal', [
                    'id' => $review->id,
                    'message' => 'Вы действительно хотите одобрить отзыв?',
                    'actionUrl' => route('admin.reviews.changeStatus', $review->id)
                ])
                <div class="shadow-lg feedback">
                    <div class="feedbacks">
                        <h1>{{ $review->user->name }}
                            @for($i = 1; $i <= $review->rating; $i++)
                                <img src="{{ asset('images/star.png') }}" alt="">
                            @endfor
                        </h1>
                        <h6>Статус: <span class="text-warning">{{ $review->status->name }}</span></h6>
                        <div class="date mt-1">Добавлено: {{ date('d.m.Y', strtotime($review->date)) }}</div>
                        <div class="comment">
                            <p class="comment">{{ $review->comment }}</p>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button data-action="reject"
                                data-bs-toggle="modal"
                                data-bs-target="#reject{{ $review->id }}"
                                type="button"
                                class="btn btn-danger consultationReject" name="action" value="reject" style="margin-right: 10px;">
                            Отклонить
                        </button>
                        <button data-bs-toggle="modal"
                                data-bs-target="#approve{{ $review->id }}" type="button"
                                class="btn btn-primary consultationApprove">
                            Одобрить
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div>
        {{ $reviews->withQueryString()->links() }}
    </div>
@endsection
