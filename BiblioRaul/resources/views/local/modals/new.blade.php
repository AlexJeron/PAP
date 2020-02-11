<div class="modal fade" id="newLocalModal" tabindex="-1" role="dialog" aria-labelledby="newLocalModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form {{ request()->is('local') ? 'method=POST action=/local' : 'id=newLocalForm' }}>
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newLocalModalLabel">Adicionar Local</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="nome" class="col-sm-3 col-form-label text-md-right">{{ __('Nome') }}</label>
                        <div class="col-sm-9">
                            <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror"
                                name="nome" value="{{ old('nome') }}" maxlength="80" autofocus required>

                            @error('nome')
                            <div class="invalid-feedback">{{ $errors->first('nome') }}</div>
                            @enderror

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="capacidade"
                            class="col-sm-3 col-form-label text-md-right">{{ __('Capacidade') }}</label>

                        <div class="col-sm-9">
                            <input id="capacidade" type="number"
                                class="form-control @error('capacidade') is-invalid @enderror" name="capacidade"
                                value="{{ old('capacidade') }}" min="1" max="1000000">

                            @error('capacidade')
                            <div class="invalid-feedback">{{ $errors->first('capacidade') }}</div>
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
