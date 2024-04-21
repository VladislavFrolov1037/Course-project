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
                    <div class="date mt-1">Добавлено: {{ date('d.m.Y', strtotime($review->date)) }}</div>
                    <div class="comment">
                        <p class="comment">{{ $review->comment }}</p>
                    </div>
                </div>
                @if(request()->is('admin/*'))
                    <button name="action" type="button" class="btn btn-danger btn-delete mt-3"
                            data-action="delete" data-bs-toggle="modal"
                            data-bs-target="#delete{{$review->id}}"
                            style="margin-right: 10px;">Удалить
                    </button>
                    @include('components.modals.deleteModal', ['id' => $review->id, 'bodyText' => 'Вы действительно хотите удалить отзыв?', 'actionUrl' => route('admin.reviews.destroy', $review->id)])
                @endif
            </div>
        @endforeach
    </div>
</div>
<div>
    {{ $reviews->withQueryString()->links() }}
</div>
