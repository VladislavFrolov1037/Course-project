@extends('layouts.admin')
@section('content')
    <div class="container mb-5">
        <ul class="nav nav-tabs" id="advertisementTabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="all-ads-tab" href="{{ route('admin.users.index') }}" role="tab"
                   aria-controls="all-ads" aria-selected="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                         class="bi bi-list mb-2 mt-1" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                    </svg>
                    Все пользователи
                </a>
            </li>
        </ul>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col"><a
                            href="{{ route('admin.users.index', ['sort' => 'name', 'order' => ($sort === 'name' && $order === 'asc' ? 'desc' : 'asc')]) }}">Имя</a>
                    </th>
                    <th scope="col"><a
                            href="{{ route('admin.users.index', ['sort' => 'email', 'order' => ($sort === 'email' && $order === 'asc' ? 'desc' : 'asc')]) }}">Почта</a>
                    </th>
                    <th scope="col">Телефон</th>
                    <th scope="col"><a
                            href="{{ route('admin.users.index', ['sort' => 'role', 'order' => ($sort === 'role' && $order === 'asc' ? 'desc' : 'asc')]) }}">Роль</a>
                    </th>
                    <th scope="col">Действия</th>
                </tr>
                </thead>

                <tbody>
                @foreach($users as $index => $user)
                    <div class="modal fade" id="deleteModal{{ $user->id }}" tabindex="-1"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Подтвердите действие</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Вы действительно хотите удалить объявление?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть
                                    </button>
                                    <form action="{{ route('admin.users.destroy', $user->id) }}"
                                          method="post">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" value="Удалить" class="btn btn-danger btn-delete"
                                               style="margin-right: 10px;" name="action"
                                               data-action="delete">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->isAdmin() ? 'admin' : 'user' }}</td>
                        <td class="d-flex">
                            <div>
                                <a href="{{ route('admin.users.edit', $user) }}" type="button"
                                   class="btn btn-edit-user">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                                         class="bi bi-pencil" viewBox="0 0 16 16">
                                        <path
                                            d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                                    </svg>
                                </a>
                            </div>
                            <div>
                                <button type="button"
                                        class="btn btn-delete-user"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $user->id }}"
                                        data-user-id="{{ $user->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                         fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                        <path
                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

            <div>
                {{ $users->withQueryString()->links() }}
            </div>
        </div>
    </div>
@endsection
