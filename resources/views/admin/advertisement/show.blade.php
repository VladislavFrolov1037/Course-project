@extends('layouts.admin')
@section('content')
    <div class="infoPage">
        <div class="path">
            <p class="link-primary"><a href="{{ route('admin.index') }}">Админка</a> - <a href="{{ route('admin.advertisements.index') }}">Объявления</a> - <span>г. {{ $advertisement->address->district->city->name }} ул. {{ $advertisement->address->address }} {{ $advertisement->address->house_number }}</span>
            </p>
        </div></div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                @include('components.advertisements.advertisement', ['advertisement' => $advertisement, 'images' => $images])
            </div>
        </div>
    </div>

    @include('components.modals.approveModal', ['id' => $advertisement->id, 'message' => 'Вы действительно хотите одобрить объявление?', 'actionUrl' => route('admin.advertisements.changeStatus', $advertisement->id)])
    @include('components.modals.rejectModal', ['id' => $advertisement->id, 'message' => 'Вы действительно хотите отклонить объявление?', 'actionUrl' => route('admin.advertisements.changeStatus', $advertisement->id)])
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.addEventListener('click', function (event) {
                const target = event.target;

                if (target.classList.contains('btn_delete')) {
                    const confirmed = confirm('Вы уверены, что хотите удалить это объявление?');
                    if (confirmed) {
                        const form = target.closest('form');
                        if (form) {
                            form.submit();
                        }
                    }
                }
            });
        });
    </script>
@endsection
