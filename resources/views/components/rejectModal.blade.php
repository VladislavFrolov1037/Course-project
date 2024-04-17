<div class="modal fade" id="reject{{ $advertisement->id }}" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Подтвердите действие</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Вы действительно хотите отклонить объявление?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть
                </button>
                <form class="statusForm"
                      action="{{ route('admin.advertisement.changeStatus', $advertisement->id) }}"
                      method="post" id="statusForm">
                    @csrf
                    @method('patch')
                    <div class="btn-group"
                         style="display: flex; justify-content: space-between; align-items: center;">
                        <div>
                            <button name="action" value="reject" type="submit"
                                    class="btn btn-danger btn-reject">
                                Отклонить
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
