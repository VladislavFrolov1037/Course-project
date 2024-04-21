@extends('layouts.admin')
@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                @include('components.advertisements.advertisement', ['advertisement' => $advertisement, 'images' => $images])
            </div>
        </div>
    </div>

    @include('components.modals.approveModal')
    @include('components.modals.rejectModal')
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
