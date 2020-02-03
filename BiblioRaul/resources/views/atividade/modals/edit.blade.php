<div class="modal fade" id="editAtividadeModal" tabindex="-1" role="dialog" aria-labelledby="editAtividadeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form method="POST" action="/atividade/{{ $atividade->id }}">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editAtividadeModalLabel">Editar Atividade</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id" value="{{ $atividade->id }}">
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">{{ __('Nome') }}</label>
                        <div class="col-sm-10">
                            <input id="name" type="text" class="form-control @error('nome') is-invalid @enderror"
                                name="nome" value="{{ $atividade->nome }}" maxlength="80" autofocus required>

                            @error('nome')
                            <div class="invalid-feedback">{{ $errors->first('nome') }}</div>
                            @enderror

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="observacao" class="col-sm-2 col-form-label">{{ __('Observação') }}</label>

                        <div class="col-sm-10">
                            <input id="observacao" type="text"
                                class="form-control @error('observacao') is-invalid @enderror" name="observacao"
                                value="{{ $atividade->observacao }}" maxlength="80">

                            @error('observacao')
                            <div class="invalid-feedback">{{ $errors->first('observacao') }}</div>
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
