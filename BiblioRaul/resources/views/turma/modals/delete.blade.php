<div class="modal fade" id="deleteTurmaModal" tabindex="-1" role="dialog" aria-labelledby="deleteTurmaModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="{{ route('turma.destroy', 'delete') }}">
            @method('DELETE')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteTurmaModalLabel">Apagar Turma</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="padding-left:3.4rem">
                    <input type="hidden" name="class_id" id="turma_id" value="">
                    Tem a certeza que deseja apagar este registo?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Apagar</button>
                </div>
            </div>
        </form>
    </div>
</div>
