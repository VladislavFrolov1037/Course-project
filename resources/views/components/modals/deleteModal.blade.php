<div class="modal fade" id="delete{{ $id }}" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Подтвердите действие</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ $bodyText }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть
                </button>
                <form action="{{ $actionUrl }}" class="custom-form"
                      method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Удалить" class="btn btn-danger btn-delete sendForm"
                           style="margin-right: 10px;" name="action"
                           data-action="delete">
                </form>
            </div>
        </div>
    </div>
</div>
