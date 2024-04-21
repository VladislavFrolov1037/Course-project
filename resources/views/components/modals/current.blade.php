<div class="modal fade" id="current{{ $id }}" tabindex="-1"
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
                <form action="{{ $actionUrl }}"
                      method="post" class="custom-form">
                    @csrf
                    @method('patch')
                    <button type="submit" value="current" class="btn btn-info btn-current sendForm"
                            style="margin-right: 10px;" name="action"
                            data-action="current">Завершить</button>
                </form>
            </div>
        </div>
    </div>
</div>
