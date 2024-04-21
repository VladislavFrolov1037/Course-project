@extends('layouts.admin')
@section('content')

    @include('admin.consultation.buttons', ['id' => 3])

    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col"><a
                            href="{{ route('admin.consultations.expected', ['sort' => 'name', 'order' => ($sort === 'name' && $order === 'asc' ? 'desc' : 'asc')]) }}">Имя</a>
                </th>
                <th scope="col"><a
                            href="{{ route('admin.consultations.expected', ['sort' => 'email', 'order' => ($sort === 'email' && $order === 'asc' ? 'desc' : 'asc')]) }}">Почта</a>
                </th>
                <th scope="col">Телефон</th>
                <th scope="col"><a
                            href="{{ route('admin.consultations.expected', ['sort' => 'date', 'order' => ($sort === 'date' && $order === 'asc' ? 'desc' : 'asc')]) }}">Дата
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
