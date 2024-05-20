<div class="container">
    <div class="row justify-content-center">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Почта</th>
                <th scope="col">Идея</th>
                <th scope="col">Статус</th>
                <th scope="col">Действие</th>
            </tr>
            </thead>
            <tbody>
            @foreach($feedbacks as $index => $feedback)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>{{ $feedback->email }}</td>
                    <td>{{ $feedback->message }}</td>
                    <td class="{{ $approve ? 'text-info' : 'text-warning' }}">{{ $feedback->status->name }}</td>
                    <td>
                        @if(!$approve)
                            @include('components.modals.rejectModal', [
                             'id' => $feedback->id,
                             'message' => 'Вы действительно хотите отклонить пожелание?',
                             'actionUrl' => route('admin.feedbacks.changeStatus', $feedback->id),
                             ])

                            @include('components.modals.approveModal', [
                                'id' => $feedback->id,
                                'message' => 'Вы действительно хотите одобрить пожелание?',
                                'actionUrl' => route('admin.feedbacks.changeStatus', $feedback->id),
                            ])
                            <button data-action="reject"
                                    data-bs-toggle="modal" name="action" value="reject"
                                    data-bs-target="#reject{{ $feedback->id }}"
                                    type="button"
                                    class="btn btn-danger consultationReject">
                                Отклонить
                            </button>
                            <button data-bs-toggle="modal"
                                    data-bs-target="#approve{{ $feedback->id }}" type="button"
                                    class="btn btn-primary consultationApprove">
                                Одобрить
                            </button>
                        @else
                            @include('components.modals.deleteModal', ['id' => $feedback->id, 'bodyText' => 'Вы действительно хотите удалить идею?', 'actionUrl' => route('admin.feedbacks.destroy', $feedback->id)])
                            <button class="btn btn-danger" type="button" data-bs-toggle="modal"
                                    data-bs-target="#delete{{ $feedback->id }}">Удалить</button>
                        @endif

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div>
            {{ $feedbacks->withQueryString()->links() }}
        </div>
    </div>
</div>
