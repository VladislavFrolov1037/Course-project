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
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $meeting->name }}</td>
                        <td>{{ $meeting->email }}</td>
                        <td>{{ $meeting->phone }}</td>
                        <td>{{ $meeting->date }}</td>
                        <td>{{ $meeting->time }}</td>
                        <td><a href="{{ route('admin.advertisements.show', $meeting->advertisement_id) }}">{{ $meeting->advertisement_id }}</a></td>
                        <td class="{{ $approve ? 'text-info' : 'text-warning' }}">{{ $meeting->status->name }}</td>
                        <td>
                            @if(!$approve)
                                <form action="{{ route('admin.feedbacks.changeStatus', $meeting->id) }}" method="post">
                                    @csrf
                                    @method('patch')
                                    <button class="btn btn-danger" type="submit" name="action" value="reject"
                                            style="margin-right: 10px;">Отклонить
                                    </button>
                                    <button class="btn btn-success" type="submit" name="action" value="approve">Одобрить
                                    </button>
                                </form>
                            @else
                                @include('components.modals.deleteModal', ['id' => $meeting->id, 'bodyText' => 'Вы действительно хотите удалить идею?', 'actionUrl' => route('admin.feedbacks.destroy', $meeting->id)])
                                <button class="btn btn-danger" type="button" data-bs-toggle="modal"
                                        data-bs-target="#delete{{ $meeting->id }}">Удалить</button>
                            @endif
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
