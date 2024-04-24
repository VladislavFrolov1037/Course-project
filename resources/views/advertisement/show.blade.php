@extends('layouts.main')
@section('content')

    <div class="infoPage">
        <div class="path">
            <p class="link-primary"><a href="{{ route('main') }}">Главная</a> - <a
                    href="{{ route('advertisements.index') }}">Объявления - </a> <span>г.{{ $advertisement->address->district->city->name }}, улица {{ $advertisement->address->address }} {{ $advertisement->address->house_number }}</span></span>
            </p>
        </div>
        <div class="info">
            <h1>
                <span>г.{{ $advertisement->address->district->city->name }}, улица {{ $advertisement->address->address }} {{ $advertisement->address->house_number }}</span>
            </h1>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                @include('components.advertisements.advertisement', ['advertisement' => $advertisement, 'images' => $images])
                @include('components.modals.deleteModal', ['id' => $advertisement->id, 'bodyText' => 'Вы действительно хотите удалить объявление?', 'actionUrl' => 'advertisements.delete'])
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let successMessage = {!! json_encode(session('success_message')) !!};
            if (successMessage) {
                showSuccessModal();
            }

            let errors = {!! json_encode($errors->toArray()) !!};
            if (errors.name || errors.email || errors.phone || errors.date || errors.time) {
                let modal = new bootstrap.Modal(document.getElementById('meetingModal'));
                modal.show();
            }

            function showSuccessModal() {
                let modal = new bootstrap.Modal(document.getElementById('successModal'));
                modal.show();
            }
        });
    </script>

@endsection


