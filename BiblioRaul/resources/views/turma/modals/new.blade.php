<div class="modal fade" id="newTurmaModal" tabindex="-1" role="dialog" aria-labelledby="newTurmaModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <form method="POST" action="/turmas">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newTurmaModalLabel" style="margin-left: -2.1rem;">Registar Turma</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group row">
                        <label for="nome" class="col-sm-3 col-form-label text-md-right">{{ __('Nome') }}</label>

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
