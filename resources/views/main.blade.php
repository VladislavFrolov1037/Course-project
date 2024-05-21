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
                    <a href="{{ route('advertisements.create') }}">Сдать в аренду</a>
                    <a href="{{ route('advertisements.index') }}">Снять недвижимость</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <h2 class="text-center">Последняя добавленая недвижимость</h2>
            @foreach($advertisements as $advertisement)
                @include('components.advertisements.advertisements', ['routeLink' => 'advertisements.show'])
            @endforeach
            <a href="{{ route('advertisements.index') }}" class="btn btn-primary w-25 mt-3">Полный каталог
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
                @include('components.advertisements.advertisements', ['routeLink' => 'advertisements.show'])
            @endforeach
            <a href="{{ route('advertisements.index') }}" class="btn btn-primary w-25 mt-3">Полный каталог
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
        <h2 class="text-center mb-4"><a class="link" href="{{ route('reviews.index') }}">Отзывы о компании <img
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

    <a id="feedback-form" class="feedback-form" name="feedback-form"></a>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card custom-form-container">
                    <div class="card-body">
                        <h2 class="card-title custom-form-title">Оставьте ваш комментарий или запрос администратору</h2>
                        <form action="{{ route('feedbacks.store') }}" class="custom-form" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="email" class="form-control custom-input" id="email" name="email"
                                       placeholder="Ваш Email" value="{{ old('email') }}">
                                @error('email', 'feedback')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea class="form-control custom-input" id="message" name="message" rows="4"
                                          placeholder="Ваш комментарий, идея или запрос">{{ old('message') }}</textarea>
                                @error('message', 'feedback')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary custom-button sendForm">Отправить</button>
                        </form>
                    </div>
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
                <form action="{{ route('consultations.store') }}" id="consultation-form" class="custom-form"
                      method="post">
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
                        <button type="submit" class="btn btn-primary sendForm">Отправить</button>
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
