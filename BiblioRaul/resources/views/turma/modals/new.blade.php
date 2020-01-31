<div class="modal fade" id="newTurmaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <form method="POST" action="/turma">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registar Turma</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="ano" class="col-sm-3 col-form-label">{{ __('Ano') }}</label>
                        <div class="col-sm-9">
                            <input id="ano" type="text" class="form-control @error('ano') is-invalid @enderror"
                                name="ano" value="{{ old('ano') }}" maxlength="80" autofocus required>

                            @error('ano')
                            {{-- <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> --}}
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nome" class="col-sm-3 col-form-label">{{ __('Nome') }}</label>

                        <div class="col-sm-9">
                            <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror"
                                name="nome" value="{{ old('nome') }}" maxlength="80">

                            @error('nome')
                            <div class="invalid-feedback">{{ $message }}</div>

                            {{-- <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> --}}
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Registar') }}
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
