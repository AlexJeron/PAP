<div class="modal fade" id="editTurmaModal" tabindex="-1" role="dialog" aria-labelledby="editTurmaModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <form method="POST" action="/turmas/{{ $turma->id }}">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTurmaModalLabel" style="margin-left: -2.1rem;">Editar Turma</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        style="margin-right: -2.5rem;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id" value="{{ $turma->id }}">
                    <div class="form-group row">
                        <label for="nome" class="col-sm-3 col-form-label text-md-right">{{ __('Nome') }}</label>

                        <div class="col-sm-9">
                            <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror"
                                name="nome" value="{{ $turma->nome }}" maxlength="80" required>

                            @error('nome')
                            <div class="invalid-feedback">{{ $errors->first('nome') }}</div>
                            @enderror

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Editar') }}
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>