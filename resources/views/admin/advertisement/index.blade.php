@extends('layouts.admin')
@section('content')
    <div class="container mb-5">
        <ul class="nav nav-tabs" id="advertisementTabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="all-ads-tab" href="{{ route('admin.advertisement.index') }}" role="tab"
                   aria-controls="all-ads" aria-selected="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                         class="bi bi-list mb-2 mt-1" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                    </svg>
                    Все объявления
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pending-ads-tab" href="{{ route('admin.advertisement.expected') }}" role="tab"
                   aria-controls="pending-ads" aria-selected="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                         class="bi bi-bell mb-2 mt-1" viewBox="0 0 16 16">
                        <path
                            d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4 4 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4 4 0 0 0-3.203-3.92zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5 5 0 0 1 13 6c0 .88.32 4.2 1.22 6"/>
                    </svg>
                    Ожидаемые объявления
                </a>
            </li>
        </ul>
    </div>

    @include('components.advertisements.filter', ['actionUrl' => asset('admin/advertisements')])

    <div class="container">
        <div class="row justify-content-center">
            @foreach($advertisements as $advertisement)
                @include('components.advertisements.advertisements', ['advertisement' => $advertisement, 'routeLink' => 'admin.advertisements.show'])
                @include('components/rejectModal')
                @include('components/approveModal')
            @endforeach
            <div>
                {{ $advertisements->withQueryString()->links() }}
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/clearFilter.js') }}"></script>
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
    <script src="{{ asset('assets/js/updateDistricts.js')  }}"></script>
@endsection
