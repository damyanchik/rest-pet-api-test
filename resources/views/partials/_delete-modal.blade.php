<div class="modal fade" id="deletePet" tabindex="-1" aria-labelledby="deletePet" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" action="{{ route('petDestroy', $pet['id']) }}" class="modal-content">
            @csrf
            @method('DELETE')
            <div class="modal-header">
                <h5 class="modal-title" id="deletePet">Usuwanie pupila</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <span>Czy chcesz usunąć pupila o id {{ $pet['id'] }}?</span>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Usuń</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
            </div>
        </form>
    </div>
</div>
