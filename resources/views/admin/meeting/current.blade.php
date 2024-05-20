@extends('layouts.admin')
@section('content')
    @include('admin.meeting.buttons', ['id' => 2])
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
                    <th scope="col">Действие</th>
                </tr>
                </thead>
                <tbody>
                @foreach($meetings as $index => $meeting)
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
                        <td class="text-primary">{{ $meeting->status->name }}</td>
                        <td>
                            @include('components.modals.current', ['id' => $meeting->id, 'bodyText' => 'Вы действительно хотите одобрить встречу?', 'actionUrl' => route('admin.meetings.changeStatus', $meeting->id)])
                            <form action="{{ route('admin.meetings.changeStatus', $meeting->id) }}" method="post">
                                @csrf
                                @method('patch')
                                <button data-action="current"
                                        data-bs-toggle="modal"
                                        data-bs-target="#current{{ $meeting->id }}" class="btn btn-success"
                                        type="button"
                                        name="action" value="current">Завершить
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
