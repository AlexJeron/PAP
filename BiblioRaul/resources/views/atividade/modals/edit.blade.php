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
                        <label for="name" class="col-sm-2 col-form-label text-md-right">{{ __('Atividade') }}</label>
                        <div class="col-sm-10">
                            <input id="name" type="text" class="form-control @error('nome') is-invalid @enderror"
                                name="nome" maxlength="80" autofocus required>

                            @error('nome')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="local_id" class="col-sm-2 col-form-label text-md-right">{{ __('Local') }}</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="local_id" name="local_id">
                                @foreach ($local as $local)
                                <option value="{{ $local->id }}"> {{ $local->nome }}
                                </option>
                                @endforeach
                            </select>

                            @error('local_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="user_id"
                            class="col-sm-2 col-form-label text-md-right">{{ __('Utilizador') }}</label>

                        <div class="col-sm-10">
                            <select id="user_id" class="form-control" name="user_id">
                                @foreach ($user as $user)
                                <option value="{{ $user->id }}"> {{ $user->nome }} </option>
                                @endforeach
                            </select>

                            @error('user_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inicio" class="col-sm-2 col-form-label text-md-right">{{ __('Inicio') }}</label>

                        <div class="col-sm-10">
                            <input id="inicio" type="datetime-local"
                                class="form-control @error('inicio') is-invalid @enderror" name="inicio" required>

                            @error('inicio')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fim" class="col-sm-2 col-form-label text-md-right">{{ __('Fim') }}</label>

                        <div class="col-sm-10">
                            <input id="fim" type="datetime-local"
                                class="form-control @error('fim') is-invalid @enderror" name="fim" required>

                            @error('fim')
                            <div class="invalid-feedback">{{ $message }}</div>
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

                    <table id="profTable"></table>
                    <table id="turmaTable"></table>

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
