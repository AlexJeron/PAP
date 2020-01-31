<div class="modal fade" id="newLocalModal" tabindex="-1" role="dialog" aria-labelledby="newLocalModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="/local">
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
                        <label for="name" class="col-sm-3 col-form-label text-md-right">{{ __('Nome') }}</label>
                        <div class="col-sm-9">
                            <input id="name" type="text" class="form-control @error('nome') is-invalid @enderror"
                                name="nome" value="{{ old('name') }}" maxlength="80" autofocus required>

                            @error('nome')
                            <div class="invalid-feedback">{{ $errors->first('nome') }}</div>
                            @enderror

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="capacidade"
                            class="col-sm-3 col-form-label text-md-right">{{ __('Capacidade total') }}</label>

                        <div class="col-sm-9">
                            <input id="capacidade" type="capacidade"
                                class="form-control @error('capacidade') is-invalid @enderror" name="capacidade"
                                value="{{ old('capacidade') }}" maxlength="80">

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
