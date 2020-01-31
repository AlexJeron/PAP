<div class="modal fade" id="editTurmaModal" tabindex="-1" role="dialog" aria-labelledby="editTurmaModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <form method="POST" action="/turma/{{ $turma->id }}">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTurmaModalLabel">Editar Turma</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id" value="{{ $turma->id }}">
                    <div class="form-group row">
                        <label for="ano" class="col-sm-3 col-form-label text-md-right">{{ __('Ano') }}</label>
                        <div class="col-sm-9">
                            <input id="ano" type="text" class="form-control @error('ano') is-invalid @enderror"
                                name="ano" value="{{ $turma->ano }}" maxlength="80" autofocus required>

                            @error('ano')
                            <div class="invalid-feedback">{{ $errors->first('ano') }}</div>
                            @enderror

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nome" class="col-sm-3 col-form-label text-md-right">{{ __('Nome') }}</label>

                        <div class="col-sm-9">
                            <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror"
                                name="nome" value="{{ $turma->nome }}" maxlength="80">

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