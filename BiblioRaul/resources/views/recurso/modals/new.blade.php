<div class="modal fade" id="newRecursoModal" tabindex="-1" role="dialog" aria-labelledby="newRecursoModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="/recurso">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newRecursoModalLabel">Adicionar Recurso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="nome" class="col-sm-4 col-form-label text-md-right">{{ __('Nome') }}</label>
                        <div class="col-sm-8">
                            <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror"
                                name="nome" value="{{ old('nome') }}" maxlength="80" autofocus required>

                            @error('nome')
                            <div class="invalid-feedback">{{ $errors->first('nome') }}</div>
                            @enderror

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="quantidade_total"
                            class="col-sm-4 col-form-label text-md-right">{{ __('Quantidade Total') }}</label>

                        <div class="col-sm-8">
                            <input id="quantidade_total" type="number"
                                class="form-control @error('quantidade_total') is-invalid @enderror"
                                name="quantidade_total" value="{{ old('quantidade_total') }}" min="1" max="1000000000">

                            @error('quantidade_total')
                            <div class="invalid-feedback">{{ $errors->first('quantidade_total') }}</div>
                            @enderror

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Adicionar') }}
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
