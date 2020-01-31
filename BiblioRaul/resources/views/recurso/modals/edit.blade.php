<div class="modal fade" id="editRecursoModal" tabindex="-1" role="dialog" aria-labelledby="editRecursoModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="/recurso/{{ $recurso->id }}">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editRecursoModalLabel">Editar Recurso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id" value="{{ $recurso->id }}">
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label text-md-right">{{ __('Nome') }}</label>
                        <div class="col-sm-8">
                            <input id="name" type="text" class="form-control @error('nome') is-invalid @enderror"
                                name="nome" value="{{ $recurso->nome }}" maxlength="80" autofocus required>

                            @error('nome')
                            <div class="invalid-feedback">{{ $errors->first('nome') }}</div>
                            @enderror

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="quantidade"
                            class="col-sm-4 col-form-label text-md-right">{{ __('Quantidade Total') }}</label>

                        <div class="col-sm-8">
                            <input id="quantidade" type="text"
                                class="form-control @error('quantidade') is-invalid @enderror" name="quantidade"
                                value="{{ $recurso->quantidade }}" maxlength="80">

                            @error('quantidade')
                            <div class="invalid-feedback">{{ $errors->first('quantidade') }}</div>
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
