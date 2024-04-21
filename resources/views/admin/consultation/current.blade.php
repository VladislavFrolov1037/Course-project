@extends('layouts.admin')
@section('content')

    @include('admin.consultation.buttons', ['id' => 2])

    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col"><a
                        href="{{ route('admin.consultations.current', ['sort' => 'name', 'order' => ($sort === 'name' && $order === 'asc' ? 'desc' : 'asc')]) }}">Имя</a>
                </th>
                <th scope="col"><a
                        href="{{ route('admin.consultations.current', ['sort' => 'email', 'order' => ($sort === 'email' && $order === 'asc' ? 'desc' : 'asc')]) }}">Почта</a>
                </th>
                <th scope="col">Телефон</th>
                <th scope="col"><a
                        href="{{ route('admin.consultations.current', ['sort' => 'date', 'order' => ($sort === 'date' && $order === 'asc' ? 'desc' : 'asc')]) }}">Дата
                        создания</a></th>
                <th scope="col">Статус</th>
                <th scope="col">Действие</th>
            </tr>
            </thead>
            <tbody>
            @foreach($consultations as $index => $consultation)
                <tr>
                    <th scope="row">{{ $index+1 }}</th>
                    <td>{{ $consultation->name }}</td>
                    <td>{{ $consultation->email }}</td>
                    <td>{{ $consultation->phone }}</td>
                    <td>{{ $consultation->date }}</td>
                    <td class="@if($consultation->status_id == 1)
                        text-warning
                    @elseif($consultation->status_id == 2)
                        text-success
                    @elseif($consultation->status_id == 3)
                        text-danger
                    @elseif($consultation->status_id == 4)
                        text-info
                @endif
                ">@if($consultation->status_id != 2)
                            {{ $consultation->status->name }}
                        @else
                            Завершено
                        @endif </td>
                    <td>
                        @if ($consultation->status_id == 1)
                            @include('components.modals.rejectModal', [
                            'id' => $consultation->id,
                            'message' => 'Вы действительно хотите отклонить консультацию?',
                            'actionUrl' => route('admin.consultations.changeStatus', $consultation->id),
                            ])

                            @include('components.modals.approveModal', [
                                'id' => $consultation->id,
                                'message' => 'Вы действительно хотите одобрить консультацию?',
                                'actionUrl' => route('admin.consultations.changeStatus', $consultation->id),
                            ])
                            <button data-action="reject"
                                    data-bs-toggle="modal" name="action" value="reject"
                                    data-bs-target="#reject{{ $consultation->id }}"
                                    type="button"
                                    class="btn btn-danger consultationReject">
                                Отклонить
                            </button>
                            <button data-bs-toggle="modal"
                                    data-bs-target="#approve{{ $consultation->id }}" type="button"
                                    class="btn btn-primary consultationApprove">
                                Одобрить
                            </button>
                        @elseif($consultation->status_id == 4)
                            @include('components.modals.current', [
                                'id' => $consultation->id,
                                'bodyText' => 'Вы действительно хотите завершить консультацию?',
                                'actionUrl' => route('admin.consultations.changeStatus', $consultation->id)
                            ])
                            <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                    data-bs-target="#current{{ $consultation->id }}">Завершить
                            </button>
                        @else
                            @include('components.modals.deleteModal', [
                                'id' => $consultation->id,
                                'bodyText' => 'Вы действительно хотите удалить консультацию?',
                                'actionUrl' => route('admin.consultations.destroy', $consultation->id)
                            ])
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" value="delete"
                                    data-bs-target="#delete{{ $consultation->id }}">Удалить
                            </button>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div>
        {{ $consultations->withQueryString()->links() }}
    </div>

@endsection
