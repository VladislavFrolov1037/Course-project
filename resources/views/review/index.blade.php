@extends('layouts.main')
@section('content')
    <div class="infoPage">
        <div class="path">
            <p class="link-primary"><a href="{{ route('main') }}">Главная</a> - О компании -
                <span>Отзывы</span>
            </p>
        </div>
        <div class="info">
            <h1>Отзывы</h1>
            @auth
                <a href="{{ route('review.create') }}" class="btn btn-primary mt-2">Оставить отзыв</a>
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
        </div>
    </div>

    <script>
        let sort = document.getElementById('sort');

        sort.addEventListener('change', (e) => {
            let orderBy = e.target.options[e.target.selectedIndex].getAttribute('data-order');

            axios.get('{{ route('review.index') }}', {
                params: {
                    orderBy: orderBy
                },
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
                .then(function (response) {
                    document.querySelector('.comments').innerHTML = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });

        });

    </script>
@endsection