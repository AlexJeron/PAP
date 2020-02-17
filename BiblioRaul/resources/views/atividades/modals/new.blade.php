<div class="modal fade" id="newAtividadeModal" tabindex="-1" role="dialog" aria-labelledby="newAtividadeModalLabel"
    data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form method="POST" action="/atividades">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="newAtividadeModalLabel">Adicionar Atividade</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group row">
                        <label for="nome" class="col-sm-2 col-form-label text-md-right">{{ __('Atividade') }}<span
                                class="red" style="margin-right: -0.5rem">*</span></label>
                        <div class="col-sm-10">
                            <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror"
                                name="nome" value="{{ old('nome') }}" placeholder="Descreva a atividade" maxlength="80"
                                autofocus required>

                            @error('nome')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="new_local_id" class="col-sm-2 col-form-label text-md-right">{{ __('Local') }}<span
                                class="red" style="margin-right: -0.5rem">*</span></label>

                        <div class="col-sm-10">
                            <select class="form-control selectpicker" id="new_local_id" name="new_local_id"
                                data-live-search="true" title="Selecione um local" required>
                                @foreach ($local as $local)
                                <option value="{{ $local->id }}">{{ $local->nome }}</option>
                                @endforeach
                            </select>

                            @error('new_local_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inicio" class="col-sm-2 col-form-label text-md-right">{{ __('Início') }}<span
                                class="red" style="margin-right: -0.5rem">*</span></label>

                        <div class="col-sm-10">
                            <input type="datetime-local" id="inicio" name="inicio"
                                class="form-control @error('inicio') is-invalid @enderror" required>

                            @error('inicio')
                            <div class=" invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fim" class="col-sm-2 col-form-label text-md-right">{{ __('Fim') }}<span class="red"
                                style="visibility: hidden; margin-right: -0.5rem">*</span></label>

                        <div class="col-sm-10">
                            <input type="datetime-local" id="fim" name="fim"
                                class="form-control @error('fim') is-invalid @enderror">

                            @error('fim')
                            <div class=" invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="total_espectadores"
                            class="col-sm-2 col-form-label text-md-right">{{ __('Espectadores') }}<span class="red"
                                style="margin-right: -0.5rem">*</span></label>

                        <div class="col-sm-2" style="margin-right: -0.3rem">
                            <input id="total_espectadores" type="number" min="1"
                                class="form-control @error('total_espectadores') is-invalid @enderror"
                                name="total_espectadores" value="{{ old('total_espectadores') }}" placeholder="Total"
                                required>

                            @error('total_espectadores')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>

                        <div class="col-sm-8 pl-0">
                            <input id="outros_espectadores" type="text"
                                class="form-control @error('outros_espectadores') is-invalid @enderror"
                                name="outros_espectadores" value="{{ old('outros_espectadores') }}"
                                placeholder="Indique o tipo de espectadores (ex: Alunos) [Campo Opcional]"
                                maxlength="80">

                            @error('outros_espectadores')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="new_turmas" class="col-sm-2 col-form-label text-md-right">{{ __('Turmas') }}<span
                                class="red" style="visibility: hidden; margin-right: -0.5rem">*</span></label>
                        <div class="col-sm-9 mr-0 pr-0">
                            <select class="form-control selectpicker" id="new_turmas" name="new_turmas[]"
                                title="Selecione uma ou mais turmas" multiple data-live-search="true">
                                @foreach ($turma as $turma)
                                <option value="{{ $turma->id }}"> {{ $turma->nome }}</option>
                                @endforeach
                            </select>

                            @error('new_turmas')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>

                        <div class="col-sm-1 text-center pl-0 pr-2 pt-1 mr-n1" style="margin-left:-1.6rem">
                            <button type="button" id="clearNewSelectTurmas" class="eraser">
                                <i class="fas fa-eraser"></i>
                            </button>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="new_professores"
                            class="col-sm-2 col-form-label text-md-right">{{ __('Professores') }}<span class="red"
                                style="visibility: hidden; margin-right: -0.5rem">*</span></label>
                        <div class="col-sm-9 mr-0 pr-0">
                            <select class="form-control selectpicker" id="new_professores" name="new_professores[]"
                                title="Selecione um ou mais professores" multiple data-live-search="true">
                                @foreach ($professor as $professor)
                                <option value="{{ $professor->id }}"> {{ $professor->nome }}</option>
                                @endforeach
                            </select>

                            @error('new_professores')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>

                        <div class="col-sm-1 text-center pl-0 pr-2 pt-1 mr-n1" style="margin-left:-1.6rem">
                            <button type="button" id="clearNewSelectProfessores"
                                class="eraser">
                                <i class="fas fa-eraser"></i>
                            </button>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="new_recurso_id"
                            class="col-sm-2 col-form-label text-md-right">{{ __('Recursos') }}<span class="red"
                                style="visibility: hidden; margin-right: -0.5rem">*</span></label>
                        <div class="col-sm-2">
                            <input id="new_num_recursos" type="number" min="1"
                                class="form-control @error('new_num_recursos') is-invalid @enderror"
                                name="new_num_recursos" value="{{ old('new_num_recursos') }}" placeholder="Total">

                            @error('new_num_recursos')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>

                        <div class="col-sm-7 pl-0 pr-0" style="margin-left:-0.3rem">
                            <select class="form-control selectpicker" id="new_recurso_id" name="new_recurso_id"
                                title="Selecione um recurso" data-live-search="true">
                                @foreach ($recurso as $recurso)
                                <option value="{{ $recurso->id }}"> {{ $recurso->nome }}</option>
                                @endforeach
                            </select>

                            @error('new_recurso_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>

                        <div class="col-sm-1 text-center pl-0 pr-2 pt-1 mr-n1" style="margin-left:-1.3rem">
                            <button type="button" id="clearNewSelectRecursos" class="eraser">
                                <i class="fas fa-eraser"></i>
                            </button>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="observacao"
                            class="col-sm-2 col-form-label text-md-right">{{ __('Observações') }}<span class="red"
                                style="visibility: hidden; margin-right: -0.5rem">*</span></label>

                        <div class="col-sm-10">
                            <textarea id="observacao" class="form-control @error('observacao') is-invalid @enderror"
                                name="observacao" placeholder="Indique possíveis observações"
                                rows="1">{{ old('observacao') }}</textarea>

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
