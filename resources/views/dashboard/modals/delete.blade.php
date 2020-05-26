<div class="modal fade" id="deleteAtividadeModal" tabindex="-1" role="dialog"
    aria-labelledby="deleteAtividadeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        {{-- <form method="POST" action="{{ route('atividades.destroy', 'delete') }}"> --}}
        <form id="formEvent">
            {{-- @method('DELETE') --}}
            {{-- @csrf --}}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteAtividadeModalLabel">Apagar Atividade</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="padding-left:3.4rem">
                    <input type="hidden" name="atividade_id" id="ativ_id" value="">
                    Tem a certeza que deseja apagar esta atividade?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger delete-event">Apagar</button>
                </div>
            </div>
        </form>
    </div>
</div>