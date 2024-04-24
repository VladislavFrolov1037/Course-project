<div class="modal fade" id="reject{{ $id }}" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Подтвердите действие</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p style="font-size: 16px;">{{ $message }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                <form method="post" class="custom-form" action="{{ $actionUrl }}">
                    @csrf
                    @method('patch')
                    <button type="submit" data-action="reject" class="btn btn-danger sendForm" name="action" value="reject">Отклонить</button>
                </form>
            </div>
        </div>
    </div>
</div>
