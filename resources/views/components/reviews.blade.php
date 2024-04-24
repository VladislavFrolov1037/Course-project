<div class="shadow-lg feedback">
    <div class="feedbacks">
        <h1>{{ $review->user->name }}
            @for($i = 1; $i <= $review->rating; $i++)
                <img src="{{ asset('images/star.png') }}" alt="">
            @endfor
        </h1>
        <div class="date mt-1">Добавлено: {{ date('d.m.Y', strtotime($review->date)) }}</div>
        @if($review->user_id == auth()->id())
            <p style="font-size: 14px;"
               class="mt-1 mb-1 @if ($review->status_id == 1) text-warning @elseif($review->status_id == 2) text-success @else text-danger @endif">
                Статус: {{ $review->status->name }}</p>
        @endif
        <div class="comment">
            <p class="comment">{{ $review->comment }}</p>
        </div>
        @if(auth()->user()->id == $review->user_id && request()->is('user/*'))
            <form action="{{ route('reviews.delete', $review) }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger mt-2">Удалить отзыв</button>
            </form>
        @endif
    </div>
</div>
