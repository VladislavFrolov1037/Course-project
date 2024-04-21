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
                            <form action="{{ route('admin.feedbacks.changeStatus', $feedback->id) }}" method="post">
                                @csrf
                                @method('patch')
                                <button class="btn btn-danger" type="submit" name="action" value="reject"
                                        style="margin-right: 10px;">Отклонить
                                </button>
                                <button class="btn btn-success" type="submit" name="action" value="approve">Одобрить
                                </button>
                            </form>
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
