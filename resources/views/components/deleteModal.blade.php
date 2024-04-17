<div class="modal fade" id="delete{{ $advertisement->id }}" tabindex="-1"
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
                <form action="{{ route('advertisement.delete', $advertisement->id) }}"
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
