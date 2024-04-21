@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md"></div>
            <div class="user-management col-md-5">
                <a href="{{ route('admin.users.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" fill="currentColor"
                         class="bi bi-people" viewBox="0 0 16 16">
                        <path
                            d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
                    </svg>
                    <div class="title">Управление пользователями</div>
                    <div class="user-count">Количество пользователей: {{ $usersCount }}</div>
                </a>
            </div>
            <div class="user-management col-md-5">
                <a href="{{ route('admin.advertisements.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" fill="currentColor"
                         class="bi bi-house" viewBox="0 0 16 16">
                        <path
                            d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
                    </svg>
                    <div class="title">Управление объявлениями</div>
                    <div class="user-count">Количество новых объявлений: {{ $advertisementsCount }}</div>
                </a>
            </div>
            <div class="col-md"></div>
        </div>
        <div class="row">
            <div class="col-md"></div>
            <div class="user-management col-md-5">
                <a href="{{ route('admin.consultations.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" fill="currentColor"
                         class="bi bi-person-gear" viewBox="0 0 16 16">
                        <path
                            d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m.256 7a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1zm3.63-4.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0"/>
                    </svg>
                    <div class="title">Управление консультациями</div>
                    <div class="user-count">Количество новых консультаций: {{ $consultationsCount }}</div>
                </a>
            </div>
            <div class="user-management col-md-5">
                <a href="{{ route('admin.reviews.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" fill="currentColor"
                         class="bi bi-chat-left-quote" viewBox="0 0 16 16">
                        <path
                            d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                        <path
                            d="M7.066 4.76A1.665 1.665 0 0 0 4 5.668a1.667 1.667 0 0 0 2.561 1.406c-.131.389-.375.804-.777 1.22a.417.417 0 1 0 .6.58c1.486-1.54 1.293-3.214.682-4.112zm4 0A1.665 1.665 0 0 0 8 5.668a1.667 1.667 0 0 0 2.561 1.406c-.131.389-.375.804-.777 1.22a.417.417 0 1 0 .6.58c1.486-1.54 1.293-3.214.682-4.112z"/>
                    </svg>
                    <div class="title">Управление отзывами</div>
                    <div class="user-count">Количество новых отзывов: {{ $reviewsCount }}</div>
                </a>
            </div>
            <div class="col-md"></div>
        </div>
        <div class="row">
            <div class="col-md"></div>
            <div class="user-management col-md-5">
                <a href="{{ route('admin.feedbacks.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" fill="currentColor"
                         class="bi bi-chat-right-heart" viewBox="0 0 16 16">
                        <path
                            d="M2 1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h9.586a2 2 0 0 1 1.414.586l2 2V2a1 1 0 0 0-1-1zm12-1a2 2 0 0 1 2 2v12.793a.5.5 0 0 1-.854.353l-2.853-2.853a1 1 0 0 0-.707-.293H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z"/>
                        <path d="M8 3.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132"/>
                    </svg>
                    <div class="title">Управление идеями пользователей</div>
                    <div class="user-count">Количество новых идей: {{ $ideaCount }}</div>
                </a>
            </div>
            <div class="user-management col-md-5">
                <a href="{{ route('admin.meetings.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" fill="currentColor"
                         class="bi bi-geo-alt" viewBox="0 0 16 16">
                        <path
                            d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10"/>
                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                    </svg>
                    <div class="title">Управление встречами</div>
                    <div class="user-count">Количество новых встреч: {{ $meetingCount }}</div>
                </a>
            </div>
            <div class="col-md"></div>
        </div>
    </div>
@endsection
