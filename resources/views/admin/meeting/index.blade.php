@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Почта</th>
                    <th scope="col">Телефон</th>
                    <th scope="col">Дата</th>
                    <th scope="col">Время</th>
                    <th scope="col">Id объявления</th>
                    <th scope="col">Статус</th>
                </tr>
                </thead>
                <tbody>
                @foreach($meetings as $index => $meeting)
                    @include('components.modals.approveModal', [
                    'id' => $meeting->id,
                    'message' => 'Вы действительно хотите одобрить встречу?',
                    'actionUrl' => route('admin.meetings.changeStatus', $meeting->id)
                ])

                    <div class="modal fade" id="reject{{ $meeting->id }}" tabindex="-1" aria-labelledby="modalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <form method="post" class="custom-form"
                                  action="{{ route('admin.meetings.changeStatus', $meeting->id) }}">
                                @csrf
                                @method('patch')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLabel">Подтвердите действие</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <label for="reason">Причина по которой встреча не состоится</label>
                                        <select class="form-control mt-3" type="text" id="reason" name="reason">
                                            <option value="Из-за конфликта расписания">Отклонение из-за
                                                конфликта расписания
                                            </option>
                                            <option value="Из-за непредвиденных обстоятельств">Отклонение по
                                                непредвиденным
                                                обстоятельствам
                                            </option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            Закрыть
                                        </button>
                                        <button type="submit" data-action="reject" class="btn btn-danger sendForm"
                                                name="action" value="reject">Отклонить
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $meeting->name }}</td>
                        <td>{{ $meeting->email }}</td>
                        <td>{{ $meeting->phone }}</td>
                        <td>{{ $meeting->date }}</td>
                        <td>{{ $meeting->time }}</td>
                        <td>
                            <a href="{{ route('admin.advertisements.show', $meeting->advertisement_id) }}">{{ $meeting->advertisement_id }}</a>
                        </td>
                        <td class="text-warning">{{ $meeting->status->name }}</td>
                        <td>
                            <form action="{{ route('admin.meetings.changeStatus', $meeting->id) }}" method="post">
                                @csrf
                                @method('patch')
                                <button data-action="reject"
                                        data-bs-toggle="modal"
                                        data-bs-target="#reject{{ $meeting->id }}" class="btn btn-danger" type="button"
                                        name="action" value="reject"
                                        style="margin-right: 10px;">Отклонить
                                </button>
                                <button data-action="approve"
                                        data-bs-toggle="modal"
                                        data-bs-target="#approve{{ $meeting->id }}" class="btn btn-success"
                                        type="button"
                                        name="action" value="approve">Одобрить
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
                {{ $meetings->withQueryString()->links() }}
            </div>
        </div>
    </div>

@endsection
