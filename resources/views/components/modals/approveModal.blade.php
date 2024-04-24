<div class="modal fade" id="approve{{ $id }}" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
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
                <form method="post" action="{{ $actionUrl }}" class="custom-form">
                    @csrf
                    @method('patch')
                    <button type="submit" name="action" data-action="approve" value="approve" class="btn btn-primary sendForm">Одобрить</button>
                </form>
            </div>
        </div>
    </div>
</div>
