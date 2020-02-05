<div class="modal fade" id="newAtividadeModal" tabindex="-1" role="dialog" aria-labelledby="newAtividadeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form method="POST" action="/atividade">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newAtividadeModalLabel">Adicionar Atividade</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="nome" class="col-sm-2 col-form-label text-md-right">{{ __('Atividade') }}</label>
                        <div class="col-sm-10">
                            <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror"
                                name="nome" value="{{ old('nome') }}" maxlength="80" autofocus required>

                            @error('nome')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="local_id" class="col-sm-2 col-form-label text-md-right">{{ __('Local') }}</label>

                        <div class="col-sm-10">
                            <select class="form-control" id="local_id" name="local_id">
                                <option disabled selected></option>
                                @foreach ($local as $local)
                                <option value="{{ $local->id }}">{{ $local->nome }}</option>
                                @endforeach
                            </select>

                            @error('local_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inicio" class="col-sm-2 col-form-label text-md-right">{{ __('Início') }}</label>

                        <div class="col-sm-10">
                            <input type="datetime-local" id="inicio" name="inicio"
                                class="form-control @error('inicio') is-invalid @enderror">

                            @error('inicio')
                            <div class=" invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fim" class="col-sm-2 col-form-label text-md-right">{{ __('Fim') }}</label>

                        <div class="col-sm-10">
                            <input type="datetime-local" id="fim" name="fim"
                                class="form-control @error('fim') is-invalid @enderror">

                            @error('fim')
                            <div class=" invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="observacao"
                            class="col-sm-2 col-form-label text-md-right">{{ __('Observações') }}</label>

                        <div class="col-sm-10">
                            <textarea id="observacao" class="form-control @error('observacao') is-invalid @enderror"
                                name="observacao" rows="2">{{ old('observacao') }}</textarea>

                            @error('observacao')
                            <div class="invalid-feedback">{{ $message }}</div>
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
