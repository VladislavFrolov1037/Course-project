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
                <p class="comment">{{ $review->comment }}</p>
            </div>
        </div>
    </div>
@endforeach
