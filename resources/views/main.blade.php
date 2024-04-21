@extends('layouts.main')
@section('content')
    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-md-12 main__content">
                    <h1>Ваш идеальный дом ждет вас. <br> Арендуйте без забот.</h1>
                    <p>быстро, выгодно, безопасно</p>
                    <button class="mt-3 btn btn-primary" data-bs-toggle="modal" data-bs-target="#consultationModal">
                        Консультация
                    </button>
                </div>
                <div class="main__under mt-5 mb-5 col-md">
                    <a href="{{ route('advertisement.create') }}">Сдать в аренду</a>
                    <a href="{{ route('advertisement.index') }}">Снять недвижимость</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <h2 class="text-center">Последняя добавленая недвижимость</h2>
            @foreach($advertisements as $advertisement)
                <div class="col-md-4 mt-3">
                    <a href="{{ route('advertisement.show', $advertisement->id) }}" class="product-link">
                        <div class="main-product-card card product-card">
                            <img
                                src="{{ asset('storage/' . $advertisement->images->first()->url) }}"
                                class="card-img-top product-image" alt="Product Image">
                            <div class="card-body product-details">
                                <h4 class="card-title">г.{{ $advertisement->address->district->city->name }},<br>
                                    ул. {{ $advertisement->address->address }} {{ $advertisement->address->house_number }}
                                </h4>
                                <ul class="product-info">
                                    <li><img width="12" height="12" src="{{{ asset('assets/images/square.svg') }}}"
                                             alt=""><strong> Площадь: </strong>
                                        <span>{{ $advertisement->square }}</span>
                                    </li>
                                    <li><img width="12" height="12" src="{{{ asset('assets/images/square.svg') }}}"
                                             alt=""><strong> Количество комнат: </strong>
                                        <span>{{ $advertisement->num_rooms }}</span></li>
                                    <li><img width="12" height="12" src="{{{ asset('assets/images/floor.svg') }}}"
                                             alt=""><strong> Этаж: </strong>
                                        <span>{{ $advertisement->floor }}/{{ $advertisement->num_floors }}</span>
                                    </li>
                                    <li><img width="12" height="12" src="{{{ asset('assets/images/price.svg') }}}"
                                             alt=""><strong> Стоимость: </strong>
                                        <span>{{ $advertisement->price }}р.</span>
                                    </li>
                                    <li><img width="14" height="14" style="fill: blue"
                                             src="{{{ asset('assets/images/views.svg') }}}"
                                             alt=""><strong> Просмотрено: </strong>
                                        <span>{{ $advertisement->views }} </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            <a href="{{ route('advertisement.index') }}" class="btn btn-primary w-25 mt-3">Полный каталог
                недвижимости</a>
        </div>
    </div>

    <div class="container">
        <img class="vector" src="{{ asset('assets/images/vector.svg') }}" alt="">
    </div>

    <div class="consultation">
        <div class="container consultation-container">
            <div class="img">
                <img width="510" height="380" src="{{ asset('assets/images/company.jpg') }}" alt="">
            </div>
            <div class="consultation-content">
                <h3>Задайте вопрос эксперту <br> или получите бесплатную <br> консультацию</h3>
                <p style="font-size: 18px;" class="mt-3 mb-3">Нужен совет эксперта? Не удалось найти интересующую <br>
                    информацию на сайте или остались вопросы? Задайте
                    их профессионалу. <br> Свяжитесь с нами по указанным ниже телефонам или заполните форму обратной
                    связи</p>
                <button class="mt-3 btn btn-primary" data-bs-toggle="modal" data-bs-target="#consultationModal">
                    Консультация
                </button>
            </div>
        </div>
    </div>




    <div class="container">
        <div class="row justify-content-center">
            <h2 class="text-center">Самые популярные предложения <img src="{{ asset('assets/images/fire.svg') }}"
                                                                      alt=""></h2>
            @foreach($popularAdvertisements as $advertisement)
                <div class="col-md-4 mt-3">
                    <a href="{{ route('advertisement.show', $advertisement->id) }}" class="product-link">
                        <div class="main-product-card card product-card">
                            <img
                                src="{{ asset('storage/' . $advertisement->images->first()->url) }}"
                                class="card-img-top product-image" alt="Product Image">
                            <div class="card-body product-details">
                                <h4 class="card-title">г.{{ $advertisement->address->district->city->name }},<br>
                                    ул. {{ $advertisement->address->address }} {{ $advertisement->address->house_number }}
                                </h4>
                                <ul class="product-info">
                                    <li><img width="12" height="12" src="{{{ asset('assets/images/square.svg') }}}"
                                             alt=""><strong> Площадь: </strong>
                                        <span>{{ $advertisement->square }}</span>
                                    </li>
                                    <li><img width="12" height="12" src="{{{ asset('assets/images/square.svg') }}}"
                                             alt=""><strong> Количество комнат: </strong>
                                        <span>{{ $advertisement->num_rooms }}</span></li>
                                    <li><img width="12" height="12" src="{{{ asset('assets/images/floor.svg') }}}"
                                             alt=""><strong> Этаж: </strong>
                                        <span>{{ $advertisement->floor }}/{{ $advertisement->num_floors }}</span>
                                    </li>
                                    <li><img width="12" height="12" src="{{{ asset('assets/images/price.svg') }}}"
                                             alt=""><strong> Стоимость: </strong>
                                        <span>{{ $advertisement->price }}р.</span>
                                    </li>
                                    <li><img width="14" height="14" style="fill: blue"
                                             src="{{{ asset('assets/images/views.svg') }}}"
                                             alt=""><strong> Просмотрено: </strong>
                                        <span>{{ $advertisement->views }} </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            <a href="{{ route('advertisement.index') }}" class="btn btn-primary w-25 mt-3">Полный каталог
                недвижимости</a>
        </div>
    </div>

    <div class="container">
        <div class="aboutCompany d-flex">
            <div class="about-content">
                <h3>О компании</h3>
                <p style="font-size: 18px;" class="mt-4 mb-3">«Недвижимость мгн» – риэлтерское агентство в
                    Магнитогорске. <br>
                    Мы сопровождаем клиента от мысли о купле-продаже недвижимости <br>
                    до юридически грамотной и успешной сделки. Специализируемся на аренде, <br>
                    сдачи в аренду квартир, домов, осуществляем юридическое сопровождение сделок, помогаем с оценкой
                    и аналитикой и другими услугами</p>
                <a href="{{ route('aboutUs') }}" class="mt-3 btn btn-primary">Подробнее</a>
            </div>
            <div class="img">
                <img width="460" height="380" src="{{ asset('assets/images/logo.avif') }}" alt="">
            </div>
        </div>
    </div>

    <div class="container reviews">
        <h2 class="text-center mb-4"><a class="link" href="{{ route('review.index') }}">Отзывы о компании <img
                    src="{{ asset('assets/images/arrow.svg') }}" alt=""></a></h2>
        <div class="row">
            @foreach($reviews as $review)
                <div class="col-md-6">
                    <div class="shadow-lg feedback" style="height: 300px">
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
                </div>
            @endforeach
        </div>
    </div>

    <div class="text-center mb-5">
        <h3>Мы на карте</h3>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2827.9690333759527!2d58.976986331117644!3d53.41430710269115!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x43d12f3bca277085%3A0x40d07ea619d9b559!2z0JzQuNGAINC40L3RgdGC0YDRg9C80LXQvdGC0LA!5e0!3m2!1sru!2sru!4v1694938305828!5m2!1sru!2sru"
            width="1200" height="450" style="border:0;"
            allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>

    <a id="feedback-form" class="feedback-form" name="feedback-form"></a>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="custom-form-container" id="form">
                    <h2 class="custom-form-title">Поделитесь идеями для улучшения нашей компании</h2>
                    <form action="{{ route('feedback.store') }}" method="POST">
                        @csrf
                        <input type="email" class="custom-input" id="email" name="email" placeholder="Ваш Email"
                               value="{{ old('email') }}" required>
                        @error('email', 'feedback')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <textarea class="custom-input" id="message" name="message" rows="4" placeholder="Ваша идея"
                                  required>{{ old('message') }}</textarea>
                        @error('message', 'feedback')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <button type="submit" class="custom-button">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="consultationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Заказать консультацию</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <form action="{{ route('consultation.store') }}" id="consultation-form" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Имя</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
                            @error('name', 'consultation')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Почта</label>
                            <input type="email" name="consultation_email" class="form-control" id="consultation_email"
                                   value="{{ old('consultation_email') }}">
                            @error('email', 'consultation')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Телефон</label>
                            <input type="text" name="phone" class="form-control" id="phone" value="{{ old('phone') }}">
                            @error('phone', 'consultation')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-primary">Отправить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('components.modals.successModal')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let successMessage = {!! json_encode(session('success_message')) !!};
            if (successMessage) {
                showSuccessModal();
            }

            let consultationErrors = {!! json_encode($errors->getBag('consultation')->toArray()) !!};
            if (consultationErrors.name || consultationErrors.email || consultationErrors.phone) {
                let modal = new bootstrap.Modal(document.getElementById('consultationModal'));
                modal.show();
            }

            let feedbackForm = document.getElementById('feedback-form');
            if (feedbackForm) {
                let hasFeedbackErrors = {!! json_encode($errors->getBag('feedback')->isNotEmpty()) !!};

                if (hasFeedbackErrors) {
                    feedbackForm.scrollIntoView({behavior: 'smooth', block: 'start'});
                }
            }
        })

        function showSuccessModal() {
            let modal = new bootstrap.Modal(document.getElementById('successModal'));
            modal.show();
        }

    </script>
@endsection
