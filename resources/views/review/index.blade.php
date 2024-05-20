@extends('layouts.main')
@section('content')
    <div class="infoPage">
        <div class="path">
            <p class="link-primary"><a href="{{ route('main') }}">Главная</a> - <span>Отзывы</span>
            </p>
        </div>
        <div class="info">
            <h1>Отзывы</h1>
            @auth
                <a href="{{ route('reviews.create') }}" class="btn btn-primary mt-2 sendForm">Оставить отзыв</a>
            @endauth
            @guest
                <h4>Чтобы иметь возможность оставлять отзывы вам нужно <a
                        href="{{ route('login') }}">авторизироваться</a></h4>
            @endguest
        </div>
    </div>
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
                @include('components.reviews')
            @endforeach
        </div>
    </div>
    <div>
        {{ $reviews->withQueryString()->links() }}
    </div>

    <script>
        let sort = document.getElementById('sort');
        let currentOrderBy = '{{ app('request')->input('orderBy', 'default') }}';

        for (let i = 0; i < sort.options.length; i++) {
            if (sort.options[i].getAttribute('data-order') === currentOrderBy) {
                sort.options[i].setAttribute('selected', 'selected');
                break;
            }
        }

        sort.addEventListener('change', (e) => {
            let orderBy = e.target.options[e.target.selectedIndex].getAttribute('data-order');

            axios.get('{{ route('reviews.index') }}', {
                params: {
                    orderBy: orderBy
                },
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
                .then(function (response) {
                    renderReviews(response.data.reviews);
                    document.querySelector('.pagination').innerHTML = response.data.pagination;
                });
        });

        function renderReviews(reviews) {
            let commentsDiv = document.querySelector('.comments');
            commentsDiv.innerHTML = '';
            reviews.forEach(review => {
                let reviewHtml = `
                <div class="shadow-lg feedback">
                    <div class="feedbacks">
                        <h1>${review.user.name}`;
                for (let i = 1; i <= review.rating; i++) {
                    reviewHtml += ` <img src="{{ asset('images/star.png') }}" alt="">`;
                }
                reviewHtml += `</h1>
                        <div class="date mt-1">Добавлено: ${review.date}</div>
                        <div class="comment">
                            <p class="comment">${review.comment}</p>
                        </div>
                    </div>
                </div>`;
                commentsDiv.innerHTML += reviewHtml;
            });
        }
    </script>

@endsection
